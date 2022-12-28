<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Userregistration extends Controller
{
  public function index(Request $request){
    // $name= $request->input('name');
    $name= $request->name;
    $language= $request->fav_language;
    $bikes = implode(',', $request->vehicle);
    $bikess= explode(",",$bikes);
    print_r($bikess);
    dd($name."".$language."/".$bikes);
  }
}
