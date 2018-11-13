<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\DashboardRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Validator;

class DashboardController
{
    
    public $_repository;

    public function __construct(DashboardRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function dashboard(Request $request)
    {
        $input = $request->only('start_date', 'end_date', 'type','filter', 'get_start_date');


        if(isset($input['get_start_date'])) {
            $rules = ['get_start_date'            =>  'required|boolean',
            ];
        }else {
            $rules = [
                    'start_date'            =>  'required|date',
                    'get_start_date'            =>  'nullable|boolean',
                    'end_date'              =>  'required|date',
                    'type'                  =>  'required|in:stats,customer_signup,service_provider_signup,job_service_type,pr_over_time,pr_type,top_service_provider,top_customer',
            ];
        }
        

        $messages = [];
        $output = [];
        $validator = Validator::make($input, $rules, $messages);
        // if validation fails
        if ($validator->fails()) {
            $code = 406;
            $output = ['error' => ['code' => $code, 'messages' => $validator->messages()->all()]];
            // if validation passes
        } else {
            $code = 200;
            if(isset($input['get_start_date'])) {
                $output = [
                    'data' => config('app.start_date'),
                    'message' => '',
                ];
            }else {
                if($input['type'] == 'stats') {
                $output = $this->_repository->stats($input);
                }else if($input['type'] == 'customer_signup' || $input['type'] == 'service_provider_signup') {
                    $output = $this->_repository->signUpsOverTime($input);
                }else if($input['type'] == 'job_service_type') {
                    $output = $this->_repository->jobServiceType($input);
                }else if($input['type'] == 'pr_over_time') {
                    $output = $this->_repository->PrOverTime($input);
                }else if($input['type'] == 'pr_type') {
                    $output = $this->_repository->PrType($input);
                }else if($input['type'] == 'top_service_provider') {
                    $output = $this->_repository->topServiceProvider($input);
                    
                }else if($input['type'] == 'top_customer') {
                    $output = $this->_repository->topCustomer($input);                
                } 
            }
            
            
        }

        return response()->json($output, $code);
    }

}
