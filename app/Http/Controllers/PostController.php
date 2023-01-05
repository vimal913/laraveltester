<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
  
        return view('post', compact('posts'));
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        dd('hi');
        // alert("hi");
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'file' => 'required|mimes:doc,docx,pdf,zip,rar|max:2048',
        ]);

        
  
        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }
        // $file=time().'_'.$request->file->getClientOriginalName();
        // if($file){
        //     $fileName = time().'_'.$request->file->getClientOriginalName();
        //     $filePath =  $request->file('file')->move(public_path('uploads'), $fileName);
        //     $value=[
        //         'title' => $request->title,
        //         'body' => $request->body,
        //         'file' =>   $file,
        //     ];
        // }
        
        // Post::create($value);
        $fileName = time().'.'.$request->file->extension();  
         
        $request->file->move(public_path('uploads'), $fileName);
        Post::create([
            'title' => $request->title,
            'body' => $request->body, 
            'file' =>$fileName, 
        ]);
  
        return response()->json(['success' => 'Post created successfully.']);
    }
}
