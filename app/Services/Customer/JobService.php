<?php

namespace App\Services\Customer;

use App\Data\Models\Job;

class JobService
{
    public function getJobs($filters)
    {
        $jobQuery = Job::query();

        if (! empty($filters['user_id'])) {
            $jobQuery->customerJobs();
        }

        return $jobQuery->paginate();
    }

    public function storeJob($array)
    {
        $array['user_id'] = request()->user()->id;

        return Job::create($array);
    }
}
