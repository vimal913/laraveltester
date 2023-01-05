<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request){
        $path = $request->path();
        $url = $request->url();
        echo "Path = ".$path."<br>" ;
        echo "URL = ".public_path();

    }
    public function test(){
        return "This from test";
    }
}
