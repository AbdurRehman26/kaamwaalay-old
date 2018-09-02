<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\ServiceRepository;
use App\Data\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ServiceController extends ApiResourceController
{
    public $_repository;
    const   PER_PAGE = 25;

    public function __construct(ServiceRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'store') {

              $rules['parent_id']               = 'nullable|exists:services,id';           
              $rules['title']                   = 'required|unique:services,title'; 
              $rules['description']            = 'required';               
              $rules['is_display_banner']       = 'required|in:0,1';                   
              $rules['is_display_service_nav']  = 'required|in:0,1';                       
              $rules['is_display_footer_nav']   = 'required|in:0,1';     
              $rules['status']                  = 'required|in:0,1';    
              $rules['is_featured']                  = 'required|in:0,1';     

              //$rules['user_id'] =  'required|exists:users,id';   
        }

        if($value == 'update') {
        
        
              $rules['id']                      =  'required|exists:services,id';
              $rules['is_display_banner']       = 'nullable|in:0,1';                   
              $rules['is_display_service_nav']  = 'nullable|in:0,1';                       
              $rules['is_display_footer_nav']   = 'nullable|in:0,1';           
              $rules['status']                  = 'nullable|in:0,1';        
              $rules['parent_id']               = 'nullable|exists:services,id|not_in:'.$this->input()['id'];           
              $rules['title']                   = [
            'nullable',
            Rule::unique('services')->where(
                function ($query) {
                    $query->where('id', '!=', $this->input()['id']);
                }
            ),
              ]; 
        }


        if($value == 'destroy') {

              $rules['id'] =  'required|exists:services,id';

        }

        if($value == 'show') {

              $rules['id'] =  'required|exists:services,id';
        }

        if($value == 'index') {

              $rules['pagination'] =  'nullable|boolean';
              $rules['keyword']    = 'nullable|string';
              $rules['filter_by_featured'] = 'nullable|in:1,0';
        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only(
            'id',
            'title',
            'images',
            'parent_id',
            'pagination',
            'description',
            'is_display_banner',
            'is_display_service_nav',
            'is_display_footer_nav',
            'is_featured',
            'is_hero_nav',
            'url_prefix',
            'parent_service',
            'status',
            'keyword',
            'filter_by_featured',
            'zip_code'
        );

    $input['user_id'] = request()->user()->id;

        return $input;
    }


    //Update single record
    public function update(Request $request, $id)
    { 
        $request->request->add(['id' => $id]);
        $input = $this->input(__FUNCTION__);
        $rules = $this->rules(__FUNCTION__);
        $messages = $this->messages(__FUNCTION__);
        $this->validate($request, $rules, $messages);

        $data = $this->_repository->update($input);
    
        if ($data == 'not_parent') {
            $output = ['errors' => ['parent_id' => ['The parent id does not match']] , 'message' => 'The given data was invalid'];

            return response()->json($output, 422);
        }else{
        $output = ['response' => ['data' => $data, 'message' => $this->responseMessages(__FUNCTION__)]];
        }

        // HTTP_OK = 200;
        return response()->json($output, Response::HTTP_OK);

    }

    //Create single record
    public function store(Request $request)
    {

        $input = $this->input(__FUNCTION__);
        $rules = $this->rules(__FUNCTION__);
        $messages = $this->messages(__FUNCTION__);

        $this->validate($request, $rules, $messages);

        $data = $this->_repository->create($input);
        if ($data == 'not_parent') {
            $output = ['errors' => ['parent_id' => ['The parent id does not match']] , 'message' => 'The given data was invalid'];
        }else{
        $output = ['response' => ['data' => $data, 'message' => $this->responseMessages(__FUNCTION__)]];
        }

    
        // HTTP_OK = 200;

        return response()->json($output, Response::HTTP_OK);

    }
    //Get all records
    public function index(Request $request)
    {
        $rules = $this->rules(__FUNCTION__);
        $input = $this->input(__FUNCTION__);

        $this->validate($request, $rules);
    
        $per_page = self::PER_PAGE ? self::PER_PAGE : config('app.per_page');

        $pagination = !empty($input['pagination']) ? $input['pagination'] : false; 

        $data = $this->_repository->findByAll($pagination, $per_page, $input);
        //$count = $this->_repository->getServiceCount();
        // Urgent fix $data['data'] needs to be fixed by Ali

        $output = [
        'response' => [
            'data' => $data['data'],
            'url_prefix' => Storage::url(config('uploads.service.url.folder').'/'),
            'pagination' => !empty($data['pagination']) ? $data['pagination'] : false,
            'message' => $this->responseMessages(__FUNCTION__),
        ]
        ];

        // HTTP_OK = 200;

        return response()->json($output, Response::HTTP_OK);

    }

}
