<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AjaxCSRFController extends Controller
{
    public function view() {
        return view('ajaxcsrf');
     }
    public function store(Request $request) {

        $fileName = $request->title;  
         
        // $request->file->move(public_path('uploads'), $fileName);
        // Post::create([
        //     'title' => $request->title,
        //     'body' => $request->body, 
        //     'file' =>$fileName, 
        // ]);
  
        // return response()->json(['success' => 'Post created successfully.']);

        return response()->json(array('msg'=>  $fileName), 200);
        // return true;
     }
}
