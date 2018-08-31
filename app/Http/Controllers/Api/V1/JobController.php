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
              $rules['user_id'] = 'required|exists:users,id';
        }

        if($value == 'update') {
              $rules['id'] =  'required|exists:jobs,id';
              $rules['service_id'] = 'required|exists:services,id';
              $rules['state_id'] = 'required|exists:states,id';
              $rules['country_id'] = 'required|exists:countries,id';
              $rules['city_id'] = 'required|exists:cities,id';
              $rules['user_id'] = [
            'required',
            Rule::exists('jobs')->where(
                function ($query) {
                    $query->where('user_id', $this->input()['user_id']);
                }
            ),
              ];

        }


        if($value == 'destroy') {

        }

        if($value == 'show') {

        }

        if($value == 'index') {

              $rules['filter_by_user'] = 'nullable|exists:users,id';
        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only(
            'id', 'title', 'user_id', 'service_id', 'country_id', 'state_id',
            'city_id', 'title', 'description', 'address', 'apartment', 'zip_code',
            'images', 'schedule_at', 'preference', 'status', 'job_type',
            'filter_by_status', 'filter_by_service', 'keyword', 'pagination',
            'filter_by_user', 'filter_by_service_provider', 'filter_by_me'
        );

        if($value == 'store') {
            unset($input['status']);
        }

        $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null;
        request()->request->add(['user_id' => !empty(request()->user()->id) ? request()->user()->id : null]);

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

        $output = ['response' => ['data' => $data]];

        $code  = 200;

        return response()->json($output, $code);

    }

    public function response_messages($value = '')
    {
        $messages = [
        'store' => 'Job created successfully.',
        'update' => 'Job updated successfully.',
        'destroy' => 'Job deleted successfully.',
        ];

        return !empty($messages[$value]) ? $messages[$value] : 'Success.';
    }

}
