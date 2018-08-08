<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class User extends Model
{
	use InsertOnDuplicateKey;
    
    public function getProfileImageAttribute($value){

        return $data->profile_image ? Storage::url(config('uploads.user.folder_name').'/'.$data->profile_image) : null;

    }




}
