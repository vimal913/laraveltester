<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(Request $request){
        // create new folder
        // Storage::makeDirectory('vimal-file');
        return view('storageFile');

        // copy a file to another directory
        // Storage::copy('vimal-file/vimal.png','public/vimal.png');

        // cut a file to another directory
        // Storage::move('vimal-file/vimal.png','public/vimal.png');

        // List files or sub-files inside folder
        // $files = Storage::files('public');
        // $files = Storage::allFiles('public');
        // dd($files);

        // show file
        //    $file = Storage::get('public/vimal.png');

        //    return Storage::put('vimal-file/vimal2.png',$file);

        // download file
        // return Storage::download('vimal-file/vimal2.png');

        // Delete file(s)
        // if(Storage::exists('vimal-file/vimal2.png')){
        //     return Storage::delete('vimal-file/vimal2.png');
        // }
        // return 'no file';

        // Delete Folder
        // return Storage::deleteDirectory('vimal-file');



    }

    public function storages(Request $request){
        // store new file inside folder
        // $file = $request->file('file');
        // $name = 'vimal.'.$file->extension();
        // Storage::putFile('vimal-file',$file);
        // Storage::putFileAs('vimal-file',$file,$name);
        
        // Store public
        // $file = $request->file('file');
        // $uploaded=$file->store('vimalfile');
        // $uploaded=$file->storepublicly('public');
        // $name=$file->hashName();
        return asset('vimalfile/0tUhJ9njogKYlSA6NDjc7CMg6cm8PDcS0aRNLkYg.png'); //http://127.0.0.1:8000/vimalfile/0tUhJ9njogKYlSA6NDjc7CMg6cm8PDcS0aRNLkYg.png
        // dd(Storage::url('vimalfile/'.$name));

    }
    
}
