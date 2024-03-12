<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    // What collumns are mass asignable: allows to input data in the brackets in the controller
    protected $fillable = [
        'content',
        'likes',
    ];

}
