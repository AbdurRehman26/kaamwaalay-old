<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Data\Models\Job;

class AutoJobCompletedByCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:job-completed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command run daily at 12:05 am and marked completed all jobs which completed by service provider but pending from customer.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->jobBidRepo = app('JobBidRepository');
        $this->userRating = app('UserRatingRepository');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('auto:job-completed date: '. Carbon::now());
        $twoDaysAgo = Carbon::now()->subDays(2);
        $jobsArr = $this->jobBidRepo->model
                ->leftJoin(
                    'jobs', function ($joins) {
                        $joins->on('jobs.id', '=', 'job_bids.job_id');
                    }
                )
                ->where('job_bids.status', '=', 'completed')
                ->where('job_bids.updated_at', '<=', $twoDaysAgo)
                ->where('jobs.status', '=', Job::AWARDED)
                ->get(
                    [
                        'jobs.id as job_id',
                        'jobs.user_id as customer_id',
                        'job_bids.user_id as service_provider_id',
                    ]
                )
                ->toArray()
                ;

        $this->info('Job Count: '. count($jobsArr));
        if(count($jobsArr)) {
            $jobIds = array_column($jobsArr, 'job_id');
            $jobs = Job::whereIn('id',$jobIds)->update(['status' => Job::COMPLETED]);
            foreach ($jobsArr as $key => $jobDetail) {
                $this->userRating->model->insertOnDuplicateKey([
                    'job_id'    => $jobDetail['job_id'],
                    'user_id'   => $jobDetail['service_provider_id'],
                    'rated_by'  => $jobDetail['customer_id'],
                    'rating'    => 3,
                    'status'    => 'approved',
                    'message'    => 'Customer rated service provider.',
                ]);
            }
        }
    }

    public function info($string, $verbosity = null)
    {
        \Log::info($this->signature . ' - ' . $string);
        parent::info($this->signature . ' - ' . $string, $verbosity);
    }
}
