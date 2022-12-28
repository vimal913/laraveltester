<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //has()    ->check whether the session exist
    //get()    ->to get the session value
    //put()    ->store some data to session value
    //forget() ->delete session value
    
    public function getSession(Request $request){

        if($request->session()->has('topic')){ 
            echo $request->session()->get('topic');
        }else{
            echo 'Session Not Exist';
        }
    }
    public function storeSession(Request $request){
        $request->session()->put('topic','vimal');
        echo "Session created";
    }
    public function deleteSession(Request $request){
        $request->session()->forget('topic','vimal');
        echo "Session Deleted";
    }
}
