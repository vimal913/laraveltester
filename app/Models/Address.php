<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'address';
    protected $fillable = ['user_id','country'];

    public function owner(){ // instead user we use different name like owner

        // return $this->belongsTo(User::class);
        return $this->belongsTo(User::class,'user_id'); //when we different function name like owner
    }
}
