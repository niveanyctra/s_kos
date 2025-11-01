<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'description',
        'address',
        'location_map',
        'phone',
        'email',
        'logo_path',
    ];
}
