<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class ServiceProviderProfile extends Model
{
    use InsertOnDuplicateKey;
    const APPROVED = 'approved';
    const IN_REVIEW = 'in-review';
    const REJECTED = 'rejected';
    const PENDING = 'pending';

    protected $casts = [
        'attachments' => 'array'
    ];

}
