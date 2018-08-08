<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\UserRepository;
use App\Data\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class UserController extends ApiResourceController
{
    public $_repository;

    public function __construct(UserRepository $repository){
       $this->_repository = $repository;
   }

   public function rules($value=''){
    $rules = [];

    if($value == 'store'){

    }

    if($value == 'update'){

            $rules['id'] =  'required|exists:users,id';
            $rules['user_details.first_name']    = 'required';
            $rules['user_details.last_name']     = 'required';
            // $rules['user_details.email']         = 'required|email|unique:users,email';
    
    }


    if($value == 'destroy'){

    }

    if($value == 'show'){

    }

    if($value == 'index'){

    }

    return $rules;

}


public function input($value='')
{
    $input = request()->only('id', 'user_details', 'business_details', 'service_details', 'keyword', 'pagination', 'filter_by_status', 'filter_by_role');
    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
    return $input;
}

public function changePassword(Request $request)
    {
        $new_password = $request->get('new_password');
        $old_password = $request->get('old_password');
        if (\Hash::check($old_password, $request->user()->password)) {
            if (strlen($new_password) >= 8) {
                //change password of logged in user
                $request->user()->password = bcrypt($new_password);
                $request->user()->save();

                return response()->json([
                     'message' => 'Password has been updated successfully.',
                ], 200);
                //Send email to user here
            } else {
                return response()->json([
                    'message' => 'Password must be minimum 8 character long.',
                ], 406);
            }
        } else {
            return response()->json([
                'message' => 'Old password is not valid.',
            ], 406);
        }
    }

 public function messages($value = '')
    {
        $messages = [
            'user_details.last_name.required' => 'The last name field is required.',
        ];
        
        return !empty($messages) ? $messages : [];
    }

}