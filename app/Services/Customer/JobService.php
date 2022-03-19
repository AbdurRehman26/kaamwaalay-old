<?php

namespace App\Services\Customer;

use App\Data\Models\Job;

class JobService
{
    public function getJobs()
    {
        return Job::where('user_id', request()->user()->id)->get();
    }

    public function storeJob($array)
    {
        $array['user_id'] = request()->user()->id;

        return Job::create($array);
    }
}
