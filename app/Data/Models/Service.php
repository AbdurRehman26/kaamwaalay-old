<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    //
    use SoftDeletes;
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
    ];

    public function subServices()
    {
        return $this->hasMany('App\Data\Models\Service', 'parent_id');
    }

    public function getImagesAttribute($value){
        $parseImage = json_decode($value);

        if(substr($parseImage->name, 0, 8) == "https://"){
          return  $value;
        }
          return $value ? Storage::url(config('uploads.service.folder').'/'.$parseImage->name) : null;
    }

}
