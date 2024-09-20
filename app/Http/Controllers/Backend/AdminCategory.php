<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CategoryDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminCategory extends Controller
{
    public function index(Request $request)
        {
            $query = Category::query();
            if (@$request->search) {
                $queryString = $request->search;
                $query->where('category', 'LIKE', "%$queryString%");
            }
            $category = $query->orderBy('id', 'desc')->paginate(15);
            // $category = Category::all();
            $categoryDetail = CategoryDetail::all(); // Ensure this line is correct
            return view('admin.category.index', compact('category', 'categoryDetail'));
        }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        $request->validate([
            'category' => 'required|string',
            'text'     =>'required|string',
            'status'   =>'required|boolean'
        ]);
        $category =Category::create([
            'category' => @$request->category,
            'text'     => @$request->text,
            'status'   => @$request->status,
            // 'created_at' =>Category::now(),
            'created_by' =>Auth::id()
          ]);
          $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];
          return redirect()->route('admin.category.index')->with($notification);
    }
    public function Edit($id){
        $category =Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function Update(Request $request){
        $id =$request->id;
        $category =Category::find($id);
        $category->category =$request->category;
        $category->text =$request->text;
        $category->save();
        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];
        return redirect()->route('admin.category.index')->with($notification);
    }
    public function InActive($id){
        Category::findOrFail($id)->update([
            'status'=>0
        ]);
        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];
        return redirect()->route('admin.category.index')->with($notification);
    }
    public function Active($id){
        Category::findOrFail($id)->update([
            'status'=>1
        ]);
        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];
        return redirect()->route('admin.category.index')->with($notification);
    }
    public function detailStore(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|integer|exists:categories,id' // Ensure category ID is valid
        ]);

        // Create a new instance of CategoryDetail
        $categoryDetail = new CategoryDetail();

        // Handle the image upload
        if ($request->file('image')) {
            $get_image = $request->file('image');
            $name_generate = hexdec(uniqid()) . '.' . $get_image->getClientOriginalExtension();
            $image_path = 'upload/category/' . $name_generate;

            // Move the uploaded file
            if ($get_image->move(public_path('upload/category'), $name_generate)) {
                $categoryDetail->image = $image_path; // Store the image path
            } else {
                return back()->withErrors(['image' => 'Image upload failed.']);
            }
        } else {
            return back()->withErrors(['image' => 'Image is required.']);
        }

        // Set the category ID
        $categoryDetail->category_id = $request->category_id; // Use category_id from the request
        $categoryDetail->save(); // Save to the database

        // Prepare the notification message
        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];

        // Redirect with notification
        return redirect()->route('admin.category.index')->with($notification);
    }
}
