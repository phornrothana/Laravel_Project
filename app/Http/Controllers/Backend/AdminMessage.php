<?php

namespace App\Http\Controllers\Backend;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminMessage extends Controller
{
    public function index(Request $request){
        $query = Message::query();
        if (@$request->search) {
            $queryString = $request->search;
            $query->where('name', 'LIKE', "%$queryString%");
            $query->orwhere('email', 'LIKE', "%$queryString%");
        }
        $data = $query->orderBy('id', 'desc')->paginate(15);
        return view('admin.contact.message',compact('data'));
    }
    public function ViewDetail($id){
        $read =Message::where('id',$id)->first();
        if($read->status ==0){
            Message::findOrFail($id)->update([
                'status'=>1
            ]);
        }
        $message = Message::find($id);
        return view('admin.contact.detail',compact('message'));
    }
}
