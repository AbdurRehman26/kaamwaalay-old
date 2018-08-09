<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use App\Data\Models\Plan;

class Campaign extends Model
{
	public function plan()
	{
		return $this->belongsTo(Plan::class);
	}
}
