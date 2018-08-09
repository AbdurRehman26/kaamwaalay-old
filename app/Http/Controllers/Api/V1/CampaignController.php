<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\CampaignRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CampaignController extends ApiResourceController
{
    public $_repository;

    public function __construct(CampaignRepository $repository){
        $this->_repository = $repository;
    }

    public function rules($value=''){
        $rules = [];

        if($value == 'store'){
            $rules['plan_id'] =  'required|exists:plans,id';
        }

        if($value == 'update'){

    }


        if($value == 'destroy'){

        }

        if($value == 'show'){

        }

        if($value == 'index'){
            $rules['pagination']    =  'nullable|boolean';
        }

        if($value == 'updateCampaign'){
            $rules['service_provider_user_id'] =  'required|exists:users,id';
            $rules['type']          =  'required|in:view,click';
        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only('id', 'pagination', 'plan_id', 'type');
        $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : 1 ;
        return $input;
    }

    public function updateCampaign(Request $request)
    {
        
        $rules = $this->rules(__FUNCTION__);
        $input = $this->input(__FUNCTION__);

        $this->validate($request, $rules);
        

        $output = ['errors' => 
                    [
                        'message' => ['There might be something wrong.']
                    ]
                ];
        $code = Response::HTTP_NOT_ACCEPTABLE;

        $response = $this->_repository->updateCampaign($input);
        if($response){
            $code = Response::HTTP_OK;
            $output = ['response' => 
                        [
                            'data' => $response,
                            'message' => 'Records has been updated successfully',
                            'code' => $code
                        ]
                    ];
        }

    
        return response()->json($output, $code);
    }
}