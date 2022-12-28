<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Validator;
use App\Http\Requests\FormDataRequest;

class ValidationController extends Controller
{
    public function index(){
        return view('Validation');
    }
    public function store(FormDataRequest $request){

        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        //     'add1' => 'required',
        //     'add2' => 'required',
        //     'city' => 'required',
        //     'states' => 'required',
        //     'zip' => 'required',
        // ]);
        
        // $validate = Validator::make($request->all(),[
        //     'email' => 'required',
        //     'password' => 'required|min:5',
        //     'add1' => 'required',
        //     'add2' => 'required',
        //     'city' => 'required',
        //     'states' => 'required',
        //     'zip' => 'required',
        // ],[
        //     'email' => 'Name must be entered',
        //     'password.min' => 'Minimum 5 characters'
        // ]);
        // if($validate->fails()){
        //     return back()->withErrors($validate->errors())->withInput();
        // }
        dd($request->all());
        // return view('Validation');
    }
}
