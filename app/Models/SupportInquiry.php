<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class SupportInquiry extends Model
{
    use InsertOnDuplicateKey;
    
	public function support_question()
	{
		return $this->belongsTo(SupportQuestion::class);
	}
}
