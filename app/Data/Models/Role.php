<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class Role extends Model
{
    use InsertOnDuplicateKey;

	const ADMIN = 1;
	const SERVICE_PROVIDER = 2;
    const CUSTOMER = 3;
	const REVIEWER = 4;

    protected $casts = [
        'scope' => 'array'
    ];

}
