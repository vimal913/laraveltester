<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function setCookie(Request $request) {
        $minutes = 1;
        // $minutes = time() + 60 * 60 * 24 * 365; // one year
        // $minutes = time() + 60 * 60 * 24; // one day
        // $minutes = time() + 60 * 60 * 24 * 7; // one week
        // $minutes = time() + 30 * 24 * 60 * 60; // one month
        $response = new Response('Hello World');
        $response->withCookie(cookie('name', 'vimal', $minutes));
        return $response;
     }
     public function getCookie(Request $request) {
        $value = $request->cookie('name');
        if($value != ''){
            return view('profile');
        }
        else{
            echo "cookie expired";
        }
     }
}
