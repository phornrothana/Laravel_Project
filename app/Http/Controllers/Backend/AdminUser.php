<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Controller
{
    public function index(Request $request){
        $query =User::query();
        if(@$request->search){
            $queryString =$request->search;
            $query->where('name', 'LIKE', "%$queryString%");
        }
        $user =$query->orderBy('id','DESC')->paginate(15);
        return  view('admin.User.index',compact('user'));
    }
    public function create(){
        return view('admin.User.create');
    }
    public function store(Request $request)
    {
    try {
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('profile_image')) {
            $get_image = $request->file('profile_image');
            $name_generate = hexdec(uniqid()) . '.' . $get_image->getClientOriginalExtension();

            // Move the image to the public directory and generate the filename
            $get_image->move(public_path('backend/upload/admin_image'), $name_generate);

            // Store only the filename in the database
            $user->profile_image = $name_generate; // <-- Change here
        }

        $user->save();

        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];

        return redirect()->route('admin.user.index')->with($notification);
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }
   public function edit($id){
    $user =User::find($id);
    return view('admin.User.edit',compact('user'));
   }
   public function update(Request $request)
{
    try {
        $id =$request->id;
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('profile_image')) {
            $get_image = $request->file('profile_image');
            $name_generate = hexdec(uniqid()) . '.' . $get_image->getClientOriginalExtension();

            // Move the image to the public directory
            $get_image->move(public_path('backend/upload/admin_image'), $name_generate);

            // Store only the filename in the database
            $user->profile_image = $name_generate; // Store just the filename
        }

        $user->save();

        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];

        return redirect()->route('admin.user.index')->with($notification);
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}
}
