<?php

namespace App\Services\Customer;

use App\Data\Models\JobBid;

class JobBidService
{
    public function getJobBids($filters)
    {
        $jobBidQuery = JobBid::query();

        if (! empty($filters['job_id'])) {
            $jobBidQuery->filterByJob($filters['job_id']);
        }

        return $jobBidQuery->paginate();
    }
}
