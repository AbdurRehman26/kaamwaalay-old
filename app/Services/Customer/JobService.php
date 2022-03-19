<?php

namespace App\Services\Customer;

use App\Data\Models\Job;

class JobService
{
    public function storeJob($array)
    {
        $array['user_id'] = request()->user()->id;
        return Job::create($array);
    }
}
