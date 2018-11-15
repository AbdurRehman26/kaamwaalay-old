<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Yadakhov\InsertOnDuplicateKey;

class Service extends Model
{
    //
    use SoftDeletes, InsertOnDuplicateKey;
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
        'icon' => 'array',
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
                $parseImage[0]->upload_url = $parseImage[0]->name;
                return  $parseImage;
            }

            $parseImage[0]->upload_url = Storage::url(config('uploads.service.folder').'/'.$parseImage[0]->name);

        }
        return $parseImage ? $parseImage : null;       
    }
    public function getIconAttribute($value)
    {
        if(!$value) {
            return $value;
        }
        $parseImage = json_decode($value);
        if(!empty($parseImage[0]->name)) {

            if(substr($parseImage[0]->name, 0, 8) == "https://") {
                $parseImage[0]->upload_url = $parseImage[0]->name;
                return  $parseImage;
            }

            $parseImage[0]->upload_url = Storage::url(config('uploads.service.folder').'/'.$parseImage[0]->name);

        }
        return $parseImage ? $parseImage : null;       
    }
}
