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
        return view('credential.registra');
        
    }
    public function logout(){

    }
}
