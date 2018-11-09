<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\JobRepository;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class JobController extends ApiResourceController
{
    public $_repository;

    public function __construct(JobRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'store') {
            $rules['service_id'] = 'required|exists:services,id';
            $rules['state_id'] = 'required|exists:states,id';
            $rules['country_id'] = 'required|exists:countries,id';
            $rules['city_id'] = 'required|exists:cities,id';
        }

        if($value == 'update'){
            $rules['id'] =  'required|exists:jobs,id,user_id,'.$this->input()['user_id'];
            $rules['service_id'] = 'exists:services,id';
            $rules['state_id'] = 'exists:states,id';
            $rules['country_id'] = 'exists:countries,id';
            $rules['city_id'] = 'exists:cities,id';
        }
        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only(

            'id', 'title', 'service_id', 'country_id', 'state_id', 
            'city_id', 'title', 'description', 'address', 'apartment', 'zip_code', 
            'images', 'videos', 'schedule_at', 'preference', 'status', 'job_type', 
            'filter_by_status', 'filter_by_service', 'keyword','pagination',
            'filter_by_user', 'filter_by_service_provider', 'filter_by_me',
            'details', 'is_archived', 'filter_by_city', 'subscription_id',
            'address_latitude', 'address_longitude'
        );

        $input['user_id'] = request()->user()->id;

        if($value == 'store' || $value == 'update'){

            unset(
                $input['filter_by_service'], $input['keyword'], $input['details'],
                $input['filter_by_status'], $input['filter_by_status'], $input['filter_by_status'],
                $input['filter_by_user'], $input['filter_by_service_provider'], $input['filter_by_me'],
                $input['filter_by_city']
            );

            if(empty($input['images'][0])){
                if(isset($input['images'])){           
                    $input['images'] = null;
                }
            }

        }

        if($value == 'store'){
            unset($input['status'], $input['is_archived']);
        }


        return $input;
    }


    public function getJobStats(Request $request)
    {
        $criteria = ['user_id' => request()->user()->id , 'status' => 'completed'];

        $completed = $this->_repository->getTotalCountByCriteria($criteria);

        $criteria = ['user_id' => request()->user()->id , 'status' => 'in_bidding'];

        $orCriteria = [
            ['user_id' => request()->user()->id , 'status' => 'initiated'],
            ['user_id' => request()->user()->id , 'status' => 'awarded']
        ];

        $active = $this->_repository->getTotalCountByCriteria($criteria, null, null, $orCriteria);

        $data = ['completed' => $completed , 'active' => $active];

        $output = [
            'data' => $data
        ];

        $code  = 200;

        return response()->json($output, $code);

    }

    public function getInviteToBidJobs(Request $request)
    {
        $input = ['filter_by_status' => 'in_bidding', 'filter_by_me' => true];

        $data = $this->_repository->findByAll(false, 10, $input);
        
        $code  = 200;

        return response()->json($data['data'], $code);

    }


    public function responseMessages($value = '')
    {

        $messages = [
            'store' => 'Job created successfully.',
            'update' => 'Job updated successfully.',
            'destroy' => 'Job deleted successfully.',
        ];

        return !empty($messages[$value]) ? $messages[$value] : 'Success.';
    }
}

