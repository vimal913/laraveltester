<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class SampleController extends Controller
{
    public function index(){
        return view('credential.login');
    }
    public function registration(){
        return view('credential.registration');
        
    }

    public function validate_registration(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data=$request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]); 
        return redirect('logins')->with('success','Registration completed,Now u Login');
    }

    public function validate_LOGIN(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $credential = $request->only('email','password');
        if(Auth::attempt($credential)){
            return redirect('dashboard');
        }

        return redirect('logins')->with('error','Login credentials are Invalid');
    }
    
    public function dashboard(){
        if(Auth::check()){
            return view('credential.dashboard');
        }
        return redirect('logins')->with('error','You are Danger Person so not Allowed');
    }

    public function logout(){
        Session::flush();
        
        Auth::logout();

        return redirect('logins');
    }
}
