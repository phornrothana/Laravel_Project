<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Logout successfully',
            'alert-type' => 'info'
        );

        return redirect('/login')->with($notification);
    }

    public function ViewProfile(){
        $id = Auth::user()->id;
        $viewAdminData = User::find($id);

        return view('admin.view_profile',compact("viewAdminData"));
    }
    public function editProfile(){
        $id = Auth::user()->id;
        $viewAdminData = User::find($id);

        return view('admin.edit_profile',compact("viewAdminData"));
    }
    public function updateProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        //Have been imgae
        if($request->file('profile_image')){

            $file =$request->file('profile_image');
            //Get name image
            $filename =date('YmdHi').$file->getClientOriginalName();
            //move file
            $file->move(public_path('backend/upload/admin_image'),$filename);
            //save file to table
            $data['profile_image'] = $filename;
        }
        //save to table
        $data->save();
        //message
        $notification = array(
            'message' => 'Data has been save',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.view.profile')->with($notification);

    }
    //get change password
    public function changePassword(){

        return view('admin.change_password');
    }
    //update Password
    public function updatePassword(Request $request){
        //validation data
        $validateData = $request->validate([
            'oldpassword' =>'required',
            'newpassword' =>'required',
            'confirmpassword' =>'required|same:newpassword',
        ]);
        //check old pass word
        $hasPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hasPassword)){
            $user =User::find(Auth::id());
            //update pass word
            $user->password =bcrypt($request->newpassword);
            $user->save();
            $notification = array(
                'message' => 'Data has been save',
                'alert-type' => 'info'
            );
            return redirect() ->back()->with($notification);
        }else{
            return redirect() ->back();
        }
    }

}
