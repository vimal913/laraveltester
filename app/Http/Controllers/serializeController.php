<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\serializeform;

class serializeController extends Controller
{
    public function index(){
        return view('serialize');
    }
    public function store(Request $request){
    //     $unserializeData = [];
    //   parse_str($request->data,$unserializeData);
    //     dd($unserializeData);

        $request->validate([
            'nameID' => 'required',
            'emailID' => 'required|email',
            'genderID' => 'required',
            'languageID' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg|max:2048',
            // 'file' => 'required|mimes:doc,docx,pdf,zip,rar|max:2048',
        ]);
        
        $fileName = time().'.'.$request->file->extension();  
         
        $request->file->move(public_path('file'), $fileName);
        $language=implode(',',$request->languageID);
      
        serializeform::create([
            'name' => $request->nameID,
            'email' => $request->emailID,
            'gender' => $request->genderID,
            'language' => $language,
            'file' => $fileName,
        ]);
        
        return response()->json('File uploaded successfully');
    }
}
