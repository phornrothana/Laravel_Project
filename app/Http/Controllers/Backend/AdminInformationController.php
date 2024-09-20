<?php

namespace App\Http\Controllers\Backend;
use App\Models\information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminInformationController extends Controller
{
    public function index(){
        $Home = information::find(1);
        if (!$Home) {
            // Handle the case where $Home is null
            return redirect()->back()->with('error', 'No information found.');
        }
        return view("admin.Home.index", compact('Home'));
    }
    public function store(Request $request){
        $id =$request->id;
        if($id){
            information::findOrFail($id)->update([
                'short_title' =>$request->short_title,
                'long_title' =>$request->long_title,
                'url' =>$request->url
            ]);
            $notification = array(
                'message' => 'Data has been save',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Please Try Again',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
