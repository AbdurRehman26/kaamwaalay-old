<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
    ];
   
}
