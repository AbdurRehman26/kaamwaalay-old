<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function scopeForState($query, $stateId){
        return $query->where('state_id', $stateId);
    }
}
