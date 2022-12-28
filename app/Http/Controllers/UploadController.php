<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class UploadController extends Controller
{
    public function index(){
        return view('upload');
    }
    public function upload(Request $request){
// echo "hello";
        $file=$request->file('file')->store('uploads');
        dd($file);
    }
    public function store(Request $request)
    {
        // echo "hello";
        $request->validate([
            'files' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        $files = [];
        if ($request->file('files')){
            foreach($request->file('files') as $key => $file)
            {
                $fileName = time().rand(1,99).'.'.$file->extension();  
                $file->move(public_path('uploads'), $fileName);
                $files[]['name'] = $fileName;
                    // dd($request->file('files'));
            }
        }
        // dd($files);
  
        foreach ($files as $key => $file) {
            File::create($file);
        }
     
        return back()
                ->with('success','You have successfully upload file.');
   
    }
}
