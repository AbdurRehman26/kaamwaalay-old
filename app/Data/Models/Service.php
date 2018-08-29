<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;

class Service extends Model
{
    //
    use SoftDeletes,Notifiable;
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
    ];

    public function subServices(){
        return $this->hasMany('App\Data\Models\Service', 'parent_id');
    }

    public function getImagesAttribute($value){
        
        $parseImage = json_decode($value);

        if(!empty($parseImage[0]->name)){

            if(substr($parseImage[0]->name, 0, 8) == "https://"){
                return  $value;
            }

            $parseImage[0]->upload_url = Storage::url(config('uploads.service.folder').'/'.$parseImage[0]->name);

        }

        return $parseImage ? $parseImage : NULL;       



    }
 public function routeNotificationForOneSignal()
    {

       \Log::info('routeNotificationForOneSignal');
        //return 'a16dfd5c-d05a-4b73-87e9-c4fb2a14609e';
        return ['tags' => ['key' => 'role_id', 'relation' => '=', 'value' => '3'],['operator'=> 'OR'],['key' => 'role_id', 'relation' => '=', 'value' => '2']];
    }
}
