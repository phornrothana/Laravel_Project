<?php

namespace App\Http\Controllers\Backend;

use App\Models\Testimonail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTestimonnail extends Controller
{
    public function index(Request $request){
        $query =Testimonail::query();
        if(@$request->search){
            $queryString =$request->search;
            $query->where('name', 'LIKE', "%$queryString%");
        }
        $data =$query->orderBy('id','DESC')->paginate(15);
        return view('admin.Testimonial.index',compact('data'));
    }
    public function create(){
        return view('admin.testimonial.create');
    }
    public function  store(Request $request){
        $Testimonial = new Testimonail();
        $Testimonial->name =$request->name;
        $Testimonial->rate =$request->rate;
        $Testimonial->position =$request->position;
        $Testimonial->des =$request->des;

        if($request->file('image')){
            $get_image = $request->file('image');
            $name_generate =hexdec(uniqid()). '.' .$get_image->getClientOriginalExtension();
            //save image to directly
            $image_path = 'upload/Testimonial/'.$name_generate;
            $get_image->move(public_path('upload/Testimonial'),$name_generate);
            $Testimonial['image'] = $image_path;
        }
        $Testimonial->save();
        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];
        return redirect()->route('admin.testimonial.create')->with($notification);
    }
    public function Edit($id){
        $testimonial = Testimonail::find($id);
        return view('admin.Testimonial.edit',compact('testimonial'));

    }
    public function Update(Request $request){
        $id =$request->id;
        $testimonial = Testimonail::findOrFail($id);
        $testimonial->name = $request->name;
        $testimonial->rate =$request->rate;
        $testimonial->position =$request->position;
        $testimonial->des =$request->des;

        if($request->file('image')){
            $get_image = $request->file('image');
            $name_generate =hexdec(uniqid()). '.' .$get_image->getClientOriginalExtension();
            //save image to directly
            $image_path = 'upload/Testimonial/'.$name_generate;
            $get_image->move(public_path('upload/Testimonial'),$name_generate);
            $testimonial->image = $image_path;
        }
        $testimonial->save();
        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];
        return redirect()->route('admin.testimonial.index')->with($notification);
    }
    public function InActive($id){
        Testimonail::findOrFail($id)->update([
            'status'=>0
        ]);
        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];
        return redirect()->route('admin.testimonial.index')->with($notification);
    }
    public function Active($id){
        Testimonail::findOrFail($id)->update([
            'status'=>1
        ]);
        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];
        return redirect()->route('admin.testimonial.index')->with($notification);
    }
}
