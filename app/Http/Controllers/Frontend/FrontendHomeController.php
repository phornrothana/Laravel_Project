<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Message;
use App\Models\Service;
use App\Models\Category;
use App\Models\BlockImage;
use Illuminate\Http\Request;
use App\Models\CategoryDetail;
use App\Models\BlogImageDetail;
use App\Http\Controllers\Controller;

class FrontendHomeController extends Controller
{
    public function HomePage(){
        $dataHome =BlockImage::where('status',1)->get();
        return view('frontend.index',compact('dataHome'));
    }
    public function BlogDetail(Request $request){
        // $blog ='';
        $blog =BlockImage::where('id',$request->id)->where('status',1)->first();
        $blogDetail =BlogImageDetail::where('blog_image_id',$request->id)->first();
        return view('frontend.blog_detail',compact('blog','blogDetail'));
    }
    public function service(Request $request){
        $service =Service::where('status',1)->get();
        return view('frontend.service.index',compact('service'));
    }
    public function contact(){
        return view('frontend.contact.index');
    }
    // public function contactStore(Request $request){
    //     $request->validate([
    //         'name'    =>'required|string',
    //         'email'   =>'required|string',
    //         'subject' =>'required|string',
    //         'message' =>'required|string',
    //         'status' => 'nullable|integer',
    //     ]);
    //     Message::create([
    //         'name'    => $request->name,
    //         'email'   => $request->email,
    //         'subject' => $request->subject,
    //         'message' => 0
    //     ]);
    //     return  redirect()->route('frontend.contact')->with("success","Message send Successfully");
    // }
    public function contactStore(Request $request) {
        $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|string|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        try {
            Message::create([
                'name'    => $request->name,
                'email'   => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'status'  => 0,
            ]);
            // return response()->json(['success' => true, 'message' => 'Message sent successfully.']);
            return response('success');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'There was an error sending your message.']);
        }
    }
    public function category(Request $request,$id){
        // $id =$request->id;
        $category = Category::where('id',$request->id)->where('status',1)->first();
        $categoryDetail = CategoryDetail::where('category_id',$request->id)->get();
        return view('frontend.category.index', compact('category', 'categoryDetail'));
    }
}
