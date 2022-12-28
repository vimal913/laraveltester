<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelsl extends Model
{
    protected $table = 'test';
    protected $fillable=['name','age'];
    public $timestamps = false;
}
