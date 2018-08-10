<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class User extends Model
{
	use InsertOnDuplicateKey;
    
    public function getProfileImageAttribute($value){
        if(substr($value, 0, 8) == "https://"){
          return  $value;
        }
          return $value ? Storage::url(config('uploads.user.folder_name').'/'.$value) : null;
    }


}
