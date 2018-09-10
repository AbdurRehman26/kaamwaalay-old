<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use App\Data\Models\SupportQuestion;
use Yadakhov\InsertOnDuplicateKey;

class SupportInquiry extends Model
{
    use InsertOnDuplicateKey;
    
	public function support_question()
	{
		return $this->belongsTo(SupportQuestion::class);
	}
}
