<?php

namespace App\Http\Controllers\Backend;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    public function index(){
        $Footer = Footer::find(1);
        return view("admin.Footer.index",compact("Footer"));
    }
    public function store(Request $request){
       $Footer = $request->id;
       if($Footer){
        Footer::findOrFail($Footer)->update([
            'twitter' =>$request->twitter,
            'facebook' =>$request->facebook,
            'instagram' =>$request->instagram,
            'link' =>$request->link,
            'copyright_by' =>$request->copyright_by,
            'design_by' =>$request->design_by
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
