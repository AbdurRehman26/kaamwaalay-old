<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use App\Data\Models\SupportQuestion;
use App\Notifications\SupportInquiry;

class SupportInquiry extends Model
{
	public function support_question()
	{
		return $this->belongsTo(SupportQuestion::class);
	}
}
