<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pen extends Model
{
    use HasFactory;
protected $fillable=['user_id','title'];
    public function user(){
        return $this->belongsTo(User::class)->withDefault([
            'name'=>'Vimal User'
        ]);
    }
    public function tags(){
        // return $this->belongsToMany(tag::class,'pen_tag','pen_id','tag_id') //name convention in alphabetic order to skip the second parameter or it mandatory
        return $this->belongsToMany(tag::class) //name convention in alphabetic order to skip the second parameter or it mandatory
                    ->using(PenTag::class)
                    ->withTimestamps()
                    ->withPivot('status'); 
    }
}
