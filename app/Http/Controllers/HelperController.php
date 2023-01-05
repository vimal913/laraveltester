<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class HelperController extends Controller
{
    public function Array(Request $request){

        // 1.Arr::add()
        // $array = Arr::add(['name' => 'Desk'], 'price', 100);
        // $array = Arr::add(['name' => 'Desk', 'price' => null], 'price', 100);

        // 2.Arr::collapse()
        // $array = Arr::collapse([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
        // 3.Arr::dot()
        // $array = ['products' => ['desk' => ['price' => 100]]];
        // $discount = data_get($array, 'products.desk.price', 0);
        
        // $flattened = Arr::dot($array);
        // print_r($flattened['products.desk.price']);

        // $array = ['name' => 'John Doe', 'age' => 17];
        // $joined = Arr::join($array, ', ');
        // print_r($joined) ;
        // $exists = Arr::exists($array, 'age');
        // if($exists == true){
        //     echo "Succed";
        // }else{
        //     echo "Unsucced";
        // }

        // $array = [100, 200, 300];
 
        // $first = Arr::first($array, function ($value, $key) {
        //     return $value >= 150;
        // });
        // foreach($array as $key => $value){
        //     echo $value."<br>";
        // }
        // echo $first;

        // $array = ['products' => ['desk' => ['price' => 100]]];
        // $discount = data_get($array, 'products.desk.prices', 0);
        // echo $discount ;

        // $path = public_path();
        // echo $path ;
        // echo __('Welcome to our application');
        // echo e('<html>foo</html>');
        // $string = 'The event will take place between :start and :end';
 
        // $replaced = preg_replace_array('/:[a-z_]+/', ['8:30', '9:00'], $string);
        // echo "$replaced";

        // $result = Str::isJson('{"first": "John", "last": "Doe"}');
        // echo $result;

        // trans
        echo trans('messages.welcome');
    }
}
