<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminService extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();
        if (@$request->search) {
            $queryString = $request->search;
            $query->where('title', 'LIKE', "%$queryString%");
        }
        $data = $query->orderBy('id', 'desc')->paginate(15);
        return view('admin.service.index', compact('data'));
    }
    public function create()
    {

        return view('admin.service.create');
    }
    public function store(Request $request)
    {
        $service = new Service();
        $service->title = @$request->title;
        $service->icon = @$request->icon;
        $service->des = @$request->des;
        $service->status= 1;

        $service->save();
        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];
        return redirect()->route('admin.service.create')->with($notification);
    }
    public function Edit($id){
        $service=Service::find($id);
        return view('admin.service.edit',compact('service'));
    }
    public function Update(Request $request){
        $id=$request->id;
        $service = Service::find($id);
        $service->title =$request->title;
        $service->icon =$request->icon;
        $service->des =$request->des;
        $service->save();
        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];
        return redirect()->route('admin.service.index')->with($notification);
    }
    public function InActive($id){
        Service::findOrFail($id)->update([
            'status'=>0
        ]);
        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];
        return redirect()->route('admin.service.index')->with($notification);
    }
    public function Active($id){
        Service::findOrFail($id)->update([
            'status'=>1
        ]);
        $notification = [
            'message' => 'Data has been saved',
            'alert-type' => 'info'
        ];
        return redirect()->route('admin.service.index')->with($notification);
    }
}
