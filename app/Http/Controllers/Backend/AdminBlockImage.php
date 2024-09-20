<?php

namespace App\Http\Controllers\Backend;
use Image;
use App\Models\BlockImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BlogImageDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminBlockImage extends Controller
{
    public function index(Request $request){

        // $data = BlockImage::paginate(15);
        $query =BlockImage::query();
        if($request->search){
            $queryString =$request->search;
            $query->where('title','LIKE',"%$queryString%");
        }
        $data = $query->orderBy('id','desc')->paginate(15);
        return view('admin.Blog.index',compact('data'));
    }
    public function create(){
        return view('admin.Blog.Create');
    }
    public function store(Request $request) {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $dataObj = new BlockImage;
        $dataObj->title = $request->title;
        $dataObj->slug = Str::slug($request->title, "-");
        $dataObj->created_by = Auth::id();

        if ($request->file('image')) {
            $get_image = $request->file('image');
            $name_generate = hexdec(uniqid()) . '.' . $get_image->getClientOriginalExtension();

            // Save the image directly to the upload path
            $image_path = 'upload/blog/' . $name_generate;
            $get_image->move(public_path('upload/blog'), $name_generate); // Move the uploaded file

            $dataObj->image = $image_path; // Store the path in the database
        }

        $dataObj->save();

        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];

        return redirect()->route('admin.blog.image.create')->with($notification);
    }
    public function editBlogImage($id){
        // $id = Auth::user()->id;
        $data =BlockImage::find($id);
        return view('admin.Blog.edit',compact('data'));


    }

    public function updateBlogImage(Request $request){
        $id = $request->id;
        $data =BlockImage::find($id);
        $data->title = $request->title;

        if($request->file('image')){
            $get_image = $request->file('image');
            $name_generate = hexdec(uniqid()) . '.' . $get_image->getClientOriginalExtension();

            // Save the image directly to the upload path
            $image_path = 'upload/blog/' . $name_generate;
            $get_image->move(public_path('upload/blog'), $name_generate); // Move the uploaded file

            $data['image']= $image_path;
        }
        $data->save();
        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];
        return redirect()->route('admin.blog.image')->with($notification);
    }
    public function BlogInActive($id){
       BlockImage::findOrFail($id)->update([
            'status'=>0
       ]);
       $notification = [
        'message' => 'Data has been saved',
        'alert-type' => 'info'
    ];
    return redirect()->route('admin.blog.image')->with($notification);
    }

    public function  BlogActive($id){

        BlockImage::findOrFail($id)->update([
             'status'=>1
        ]);
        $notification = [
         'message' => 'Data has been active',
         'alert-type' => 'success'
     ];
     return redirect()->route('admin.blog.image')->with($notification);
     }

     public function editBlogImageDetail($id) {
        $data = BlogImageDetail::where('blog_image_id', $id)->first();
        if ($data != null) {

        } else {
            $dataObject = new BlogImageDetail;
            $dataObject->blog_image_id = @$id; // Use the blog image ID
            $dataObject->created_by = Auth::id(); // Capture the creator ID
            $dataObject->save(); // This will automatically handle timestamps
        }

        return view('admin.Blog.detail.edit', compact('data'));
    }
    public function updateDetail(Request $request) {
        // Validate the incoming request
        $request->validate([
            'blog_image_id' => 'required|integer',
            'title' => 'required|string',
            'des' => 'nullable|string',
            'image' => 'nullable|image'
        ]);

        $id = $request->blog_image_id;
        $data = BlogImageDetail::find($id);
        if (!$data) {
            $notification = [
                'message' => 'Blog image detail not found',
                'alert-type' => 'error'
            ];
            return redirect()->route('admin.blog.image')->with($notification);
        }

        // Update the fields
        $data->title = $request->title;
        $data->des = $request->des;

        // Handle image upload if a file is provided
        if ($request->file('image')) {
            $get_image = $request->file('image');
            $name_generate = hexdec(uniqid()) . '.' . $get_image->getClientOriginalExtension();

            // Save the image directly to the upload path
            $image_path = 'upload/blog/' . $name_generate;
            $get_image->move(public_path('upload/blog'), $name_generate); // Move the uploaded file

            $data->image = $image_path; // Set the new image path
        }

        // Save the updated data
        $data->save();

        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];

        return redirect()->route('admin.blog.image')->with($notification);
    }
}
