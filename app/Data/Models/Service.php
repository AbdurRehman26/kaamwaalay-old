<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

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

    public function getImagesAttribute($value)
    {
        
        $parseImage = json_decode($value);

        if(!empty($parseImage[0]->name)) {

            if(substr($parseImage[0]->name, 0, 8) == "https://") {
                return  $value;
            }

            $parseImage[0]->upload_url = Storage::url(config('uploads.service.folder').'/'.$parseImage[0]->name);

        }

        return $parseImage ? $parseImage : null;       



    }
    public function getUrlPrefixAttribute($value)
    {
           return Storage::url(config('uploads.service.url.folder').'/'.$value);
    }

}
