<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use DB;
use Illuminate\Support\Facades\DB;

// import modal
use App\Models\Modelsl;

class Dbsl extends Controller
{
    public function index(){
        // $results = DB::select('select * from test where id = ?', [1]);
        // $results = DB::select('select * from test');

        // ----------Get all the data-------

        // $users = DB::table('test')->get();
 
        //     foreach ($users as $user)
        //     {
        //         echo "<table>
        //         <tr><td>$user->name</td></tr></table>";
        //     }

        // ------------chunk data not working-------------

        // DB::table('test')->chunk(1, function($users)
        //     {
        //         foreach ($users as $user)
        //         {
        //             echo $user->name;
        //         }
        // //     });

        // -----------------single data-----------------

        // $users = DB::table('test')->where('name','vimal')->first();
        //     echo($users->name);

        // ---------------Pluck values----------------    not working

        // $users = DB::table('test')->where('name','vimal')->pluck('name');
        // foreach($users as $user){
        //     echo $user->name;
        // }
        
        // --------------list values----------- not working
        
        // $users = DB::table('test')->lists('name');
        // print_r($users);
        
        // get data
        // $users = DB::table('test')->select('name')->get();
        // print_r($users);
        
        // $users = DB::table('test')->distinct()->get();
        // print_r($users);
        
        // $users = DB::table('test')->select('name as user_name')->get();
        // print_r($users);
        // $users = DB::table('test')
        //                     ->whereIdAndName(2, 'vignesh')
        //                     ->first();
        // print_r($users);
        // $users = DB::table('test')
        //                     ->whereNameOrAge('vignesh', 27)
        //                     ->first();
        // print_r($users);
        // $users = DB::table('test')
        //                     // ->orderBy('name', 'desc')
        //                     ->groupBy('name')
        //                     ->get();
        //                     // ->where('age', '>', 22)
        // dd($users);
        // $users = DB::table('test')
        //                     ->where('name','vimal')
        //                     ->orwhere(function($query){
        //                         $query->where('age','=','23');
        //                     })
        //                     ->get();
        // dd($users);
        // $users = DB::table('test')
        //                     ->count('name');
        //                     // ->get();
        // dd($users);

        // -------------------insert------------------

        // $data=[
        //     'name' => 'siva', 
        //     'age' => 26
        // ];
        // $insert = DB::table('test')->insert($data);
        // if($insert){
        //     echo "Data Inserted";
        // }

        // ----------------------update-------------------

        // $data=[
        //     'name' => 'vinoth', 
        //     'age' => 26
        // ];
        // $update = DB::table('test')->where('id',1)->update($data);
        // if($update){
        //     echo "Data Updated";
        // }

        $delete = DB::table('test')->where('id',7)->delete()->tosql();
        if($delete){
            echo "$delete";
        }
 
            
    }
    public function models()
    {
        // $data=Modelsl::find(1);
        // dd($data->name);
        // $data=Modelsl::all();
        // foreach($data as $dt){
            //     echo $dt->name."<br>";
            // }
        //     $data=[
        //             'name' => 'siva', 
        //             'age' => 29
        //         ];
        // $data=Modelsl::create($data);
        // if($data){
        //     echo "Data Inserted";
        // }
        
        $data=Modelsl::paginate(2);
        // $data = DB::paginate(2)->fragment('test');
        // dd($data);
        return view('paginate',compact('data'));
    }
}
