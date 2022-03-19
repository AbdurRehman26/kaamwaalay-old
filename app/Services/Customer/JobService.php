<?php

namespace App\Services\Customer;

use App\Data\Models\Job;

class JobService
{
    public function getJobs()
    {
        return Job::paginate();
    }

    public function storeJob($array)
    {
        $array['user_id'] = request()->user()->id;

        return Job::create($array);
    }
}
