<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = [
        'name',
        'price',
        'size',
        'status',
        'description',
        'image_path'
    ];
}
