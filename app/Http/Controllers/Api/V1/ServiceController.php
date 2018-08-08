<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\ServiceRepository;
use App\Data\Models\Role;

class ServiceController extends ApiResourceController
{
    public $_repository;

    public function __construct(ServiceRepository $repository){
       $this->_repository = $repository;
    }

   public function rules($value=''){
    $rules = [];

    if($value == 'store'){

        $rules['parent_id']               = 'nullable|exists:services,id';           
        $rules['title']                   = 'required';       
        $rules['description']            = 'required';               
        $rules['is_display_banner']       = 'required|in:0,1';                   
        $rules['is_display_service_nav']  = 'required|in:0,1';                       
        $rules['is_display_footer_nav']   = 'required|in:0,1';                   
        $rules['images']                  = 'required|array';       
        $rules['status']                  = 'required|in:0,1';    
        // $rules['user_id'] =  'required|exists:users,id,null,role_id,'.Role::ADMIN;   
    }

    if($value == 'update'){
        
        $rules['id'] =  'required|exists:services,id';
        // $rules['user_id'] =  'required|exists:users,id,null,role_id,'.Role::ADMIN;
    }


    if($value == 'destroy'){

        $rules['id'] =  'required|exists:services,id';
        // $rules['user_id'] =  'required|exists:users,id,null,role_id,'.Role::ADMIN;
        

    }

    if($value == 'show'){

        $rules['id'] =  'required|exists:services,id';
    }

    if($value == 'index'){

        $rules['pagination'] =  'nullable|boolean';
        $rules['keyword']    = 'nullable|string';
        $rules['filter_by_featured'] = 'nullable|in:1,0';
    }

    return $rules;

}


    public function input($value=''){
        $input = request()->only(
                            'id',
                            'title',
                            'title',
                            'images',
                            'parent_id',
                            'pagination',
                            'description',
                            'is_display_banner',
                            'is_display_service_nav',
                            'keyword',
                            'filter_by_featured',
                            'zip_code'
                            );
        $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
    return $input;
    }
}