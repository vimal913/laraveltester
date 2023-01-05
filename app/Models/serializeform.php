<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serializeform extends Model
{
    use HasFactory;
    protected $table = 'serialize';
  
    protected $fillable = [
        'name', 'email', 'gender', 'language', 'file'
    ];
}
