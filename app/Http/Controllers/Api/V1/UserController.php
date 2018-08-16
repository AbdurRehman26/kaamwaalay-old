<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\UserRepository;
use App\Data\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use App\Events\NewPasswordSet;
use Validator;

class UserController extends ApiResourceController
{
    public $_repository;
    const   PER_PAGE = 50;
    protected $model;
    public function __construct(UserRepository $repository){
     $this->_repository = $repository;
 }

 public function rules($value=''){
    $rules = [];

    if($value == 'store'){
        $rules['user_id'] = 'required|exists:users,id';
    }

    if($value == 'update'){

        $rules['id'] =  'required|exists:users,id';
        $rules['user_details.first_name']    = 'required';
        $rules['user_details.last_name']     = 'required';
        $rules['user_details.email']         = 'required|email|unique:users,email,'.$this->input()['user_id'];
        $rules['user_details.profile_image']     = 'nullable|string';
        $rules['business_details.business_type']     = 'nullable|in:business,individual';
        $rules['user_id'] = 'required|exists:users,id';
        
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
    $input = request()->only('id',

        'user_details.first_name', 'user_details.last_name', 'user_details.email', 'user_details.phone_number',
        'user_details.profile_image', 'user_details.address', 'user_details.apartment', 'user_details.zip_code',
        'user_details.role_id', 'user_details.city_id', 'user_details.country_id', 'user_details.social_account_id',
        'user_details.status',
        
        'business_details.business_name', 'business_details.business_details', 'business_details.duns_number',
        'business_details.years_of_experience', 'business_details.business_type',
        
        'service_details', 'keyword', 'pagination', 'filter_by_status', 'filter_by_role','filter_by_service');

    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
    request()->request->add(['user_id' => !empty(request()->user()->id) ? request()->user()->id : null]);
    
    if($value == 'update'){
        unset($input['user_details']['email']);
    }

    return $input;
}


public function messages($value = '')
{
    $messages = [
        'user_details.first_name.required' => 'The first name field is required.',
        'user_details.last_name.required' => 'The last name field is required.',
        'user_details.email.required' => 'The email field is required.',
        'user_details.phone_number.required' => 'The phone number field is required.',
        'business_details.business_type.in' => 'The business details type is invalid'
    ];

    return !empty($messages) ? $messages : [];
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
            $output = ['response' => ['data' => [],'message'=>'Password has been updated successfully.']];
                // HTTP_OK = 200;
            return response()->json($output, 200);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('first_name','last_name', 'email','role_id','access_level','status');
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required|exists:roles,id|in:1',
            'access_level' => 'required|in:full,reviewOnly',
            'status' => 'required|in:active,banned',
        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
         $code = 406;
         $output = [
             'message' => $validator->messages()->all(),
         ];
     }else{
            //generate a password for the new users
        $pw = User::generatePassword();
        $data['password'] = $pw;
        $result = $this->_repository->create($data);
        if($result) {
            $user = User::find($result->id);
            event(new NewPasswordSet($user));
            $code = 200;
            $output = [
                'data' => $result,
                'message' => 'Success',
            ];
        }else{
            $code = 406;
            $output = [
                'message' => 'An error occurred',
            ];
        }
    }
    return response()->json($output, $code);
}
public function socialLogin(Request $request)
{
    $data = $request->only('first_name','last_name', 'email','role_id','social_account_id','social_account_type','profile_pic');
    $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'role_id' => 'required|exists:roles,id',
        'social_account_id' => 'required',
        'social_account_type' => 'required|in:facebook',
    ];
    $user = $this->_repository->findByAttribute('social_account_id',$request->social_account_id);
    if(!$user){
     $rules['email'] = 'required|string|email|max:255|unique:users';
 }
 $validator = Validator::make($data,$rules);
 if ($validator->fails()) {
     $code = 406;
     $output = [
         'message' => $validator->messages()->all(),
     ];
 }else{
    if($user){
      $data['id'] = $user->id; 
      $result = $this->_repository->update($data);
  }else{
      $data['status']  = 'active';   
      $result = $this->_repository->create($data);
  }
  if($result) {
    $code = 200;
    $output = [
        'data' => $result,
        'message' => 'Success',
    ];
}else{
    $code = 406;
    $output = [
        'message' => 'An error occurred',
    ];
}
}
return response()->json($output, $code);
}
 
public function changeStatus(Request $request)
    {
        $data = $request->only('status','id','user_id');
        $data['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
        request()->request->add(['user_id' => !empty(request()->user()->id) ? request()->user()->id : null]);
        $rules = [
            'status' => 'required|in:active,banned',
            'id' => 'required|exists:users,id',
            'user_id' => 'required|exists:users,id'
        ];
        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
         $code = 406;
         $output = [
             'message' => $validator->messages()->all(),
         ];
     }else{
        $result = $this->_repository->updateField($data);
        if($result) {
            $code = 200;
            $output = [
                'data' => 'Status has been updated successfully.',
                'message' => 'Status has been updated successfully.',
            ];
        }else{
            $code = 406;
            $output = [
                'message' => 'An error occurred',
            ];
        }
    }
    return response()->json($output, $code);
  }
  public function changeAccessLevel(Request $request)
    {
        $data = $request->only('access_level','id','user_id');
        $data['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
        request()->request->add(['user_id' => !empty(request()->user()->id) ? request()->user()->id : null]);
        $rules = [
            'access_level' => 'required|in:full,reviewOnly',
            'id' => 'required|exists:users,id',
            'user_id' => 'required|exists:users,id'
        ];
        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
         $code = 406;
         $output = [
             'message' => $validator->messages()->all(),
         ];
     }else{
        $result = $this->_repository->updateField($data);
        if($result) {
            $code = 200;
            $output = [
                'data' => 'Access level has been updated successfully.',
                'message' => 'Access level has been updated successfully.',
            ];
        }else{
            $code = 406;
            $output = [
                'message' => 'An error occurred',
            ];
        }
    }
    return response()->json($output, $code);
  }

}