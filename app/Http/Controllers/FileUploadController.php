<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fileajax;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('fileuploadajax');
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg|max:2048',
            // 'file' => 'required|mimes:doc,docx,pdf,zip,rar|max:2048',
        ]);
        
        $fileName = time().'.'.$request->file->extension();  
         
        $request->file->move(public_path('file'), $fileName);
      
        Fileajax::create(['name' => $fileName]);
        
        return response()->json('File uploaded successfully');
    }
}
