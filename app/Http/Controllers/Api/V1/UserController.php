<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\UserRepository;
use App\Data\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use App\Events\NewPasswordSet;
use App\Data\Models\Role;
use Illuminate\Validation\Rule;
use Validator;
use App\Helper\Helper;

class UserController extends ApiResourceController
{
    public $_repository;
    const   PER_PAGE = 25;
    protected $model;
    public function __construct(UserRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'update'){

            $rules['id'] =  'required|exists:users,id';
            $rules['user_details.first_name']    = 'required';
            $rules['user_details.last_name']     = 'required';
            $rules['user_details.email']         = 'required|email|unique:users,email,'.$this->input()['user_id'];
            $rules['user_details.profile_image']     = 'nullable|string';
            $rules['business_details.business_type']     = 'nullable|in:business,individual';

            $rules['service_details.*.id']     = 'nullable|exists:service_provider_services,service_provider_profile_request_id';
            $rules['service_details.*.service_id']     = 'nullable|exists:services,id';

        }

        if($value == 'store') {

            $rule['first_name'] = 'required';
            $rule['last_name'] = 'required';
            $rule['email'] = 'required|email|unique:users,email|regex:/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/';
            $rule['role_id'] = ['required', Rule::in(Role::ADMIN, Role::REVIEWER)];
            $rule['status'] = 'required|in:active,banned'; 

        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only(
            'id',
            'user_details.first_name', 'user_details.last_name', 'user_details.email', 'user_details.phone_number',
            'user_details.profile_image', 'user_details.address', 'user_details.apartment', 'user_details.zip_code',
            'user_details.role_id', 'user_details.city_id', 'user_details.country_id', 'user_details.social_account_id', 'business_details.attachments',
            'user_details.status', 'user_details.state_id',  'user_details.profle_image', 'user_details.is_profile_completed', 'user_details.stripe_token',
            'business_details.business_name', 'business_details.business_details', 'business_details.duns_number',
            'business_details.years_of_experience', 'business_details.business_type',
            'service_details', 'keyword', 'pagination', 'filter_by_status', 'filter_by_role', 'filter_by_service', 'filter_by_roles'
        );

        $input['user_id'] = request()->user()->id;

        if($value == 'store') {

            $input = request()->only('first_name', 'last_name', 'email', 'role_id', 'status');
            $input['password'] = User::generatePassword();

        }
        if($value == 'update') {

            unset(
                $input['user_details']['email'], $input['pagination'], $input['filter_by_role'], 
                $input['filter_by_service'], $input['filter_by_roles'], $input['keyword']
            );

        }

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
                $output = ['response' => ['data' => [],'message'=>'Password has been updated successfully.']];
// HTTP_OK = 200;
                return response()->json($output, 200);
            } else {
                return response()->json(
                    [
                        'message' => 'Password must be minimum 8 character long.',
                    ], 406
                );
            }
        } else {
            return response()->json(
                [
                    'message' => 'The old password is incorrect.',
                ], 406
            );
        }
    }

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
    $input = $this->input(__FUNCTION__);
    $rules = $this->rules(__FUNCTION__);
    $this->validate($request, $rules);
    $result = $this->_repository->create($input);
    if($result) {
        $user = User::find($result->id);
        event(new NewPasswordSet($user));
        $code = 200;
        $output = [
            'data' => $result,
            'message' => 'Add Admin successfully',
        ];
    }else{
        $code = 406;
        $output = [
            'message' => 'An error occurred',
        ];
    }
    return response()->json($output, $code);

}
public function socialLogin(Request $request)
{
    $data = $request->only('first_name', 'last_name', 'email', 'role_id', 'social_account_id', 'social_account_type', 'profile_pic','from_sign_up');
    $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'role_id' => 'required|exists:roles,id',
        'social_account_id' => 'required',
        'social_account_type' => 'required|in:facebook',
        'from_sign_up' => 'boolean',
    ];
    $user = $this->_repository->findByAttribute('social_account_id', $request->social_account_id);
    if(!$user) {
        $rules['email'] = 'required|string|email|max:255|unique:users';
    }
    $validator = Validator::make($data, $rules);
    if ($validator->fails()) {
        $code = 406;
        $output = [
            'message' => $validator->messages()->all(),
        ];
    }else{
        if($user) {
            unset($data['role_id']);
            unset($data['from_sign_up']);
            $userData['user_details'] = $data; 
            $userData['id'] = $user->id; 
            $result = $this->_repository->update($userData);
            $userId = $user->id;
        }else{
            $data['status']  = 'active'; 
            unset($data['from_sign_up']); 
            $result = $this->_repository->create($data);
            $userId = $result->id;
        }
        if($result) {
            $user = User::find($userId);
            $scopes = (Role::find($user->role_id)->scope)?Role::find($user->role_id)->scope:[];
            $user->access_token = $token = $user->createToken('Token Name', $scopes)->accessToken;
            $code = 200;
            $output = [
                'data' => $user,
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
    $data = $request->only('status', 'id', 'user_id');
    $data['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;

    request()->request->add(['user_id' => !empty(request()->user()->id) ? request()->user()->id : null]);

    $rules = [
        'status' => 'required|in:active,banned',
        'id' => [
            'required',
            Rule::exists('users')->where(
                function ($query) {
                    $query->where('status', '!=', User::PENDING);
                }
            ),
            'not_in:'.$data['user_id']
        ],
    ];

    $validator = Validator::make($data, $rules);

    if ($validator->fails()) {
        $code = 406;
        $output = [
            'message' => $validator->messages()->all(),
        ];

    }else{

        $result = $this->_repository->updateField($data);
        if($result) {
            $userId = $data['id'];
            $sql = 'UPDATE `oauth_access_tokens` SET `revoked` = 1 WHERE `user_id` =  ?';
            $sqlParameter = [];
            $sqlParameter[] = $userId;
            \DB::select($sql, $sqlParameter);
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
    $data = $request->only('role_id', 'id', 'user_id');
    $data['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
    $rules = [
        'role_id' => ['required', Rule::in(Role::ADMIN, Role::REVIEWER)],
        'id' => 'required|exists:users,id',
        'user_id' => 'required|exists:users,id'
    ];
    $validator = Validator::make($data, $rules);
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


public function getAuthUser(Request $request)
{
    $user_id = $request->user()->id;
    $details = $request->only('details');

    $data = $this->_repository->findById(
        $user_id,
        false,
        !empty($details['details']) ? $details['details'] : false
    );

    $output = [
        'response' => [
            'data' => $data,
        ]
    ];
    $code = 200;
// HTTP_OK = 200;

    return response()->json($output, $code);

}



public function responseMessages($value = '')
{
    $messages = [
        'store' => 'User created successfully.',
        'update' => 'User updated successfully.',
        'destroy' => 'User deleted successfully.',
    ];

    return !empty($messages[$value]) ? $messages[$value] : 'Success.';
}

public function messages($value = '')
{
    $messages = [
        'user_details.first_name.required' => 'The first name field is required.',
        'user_details.last_name.required' => 'The last name field is required.',
        'user_details.email.required' => 'The email field is required.',
        'user_details.phone_number.required' => 'The phone number field is required.',
        'business_details.business_type.in' => 'The business details type is invalid',
        'service_details.*.id.exists' => 'The service profile request id is invalid',
        'service_details.*.service_id.exists' => 'The service id is invalid'
    ];

    return !empty($messages) ? $messages : [];
}
public function socialLoginCheck(Request $request)
{
    $data = $request->only('email','social_account_id', 'social_account_type');
    $rules = [
        'email' => 'required|string|email|max:255',
        'social_account_id' => 'required',
        'social_account_type' => 'required|in:facebook',
    ];
    $userModel = $this->_repository->model;
    $result = $userModel->where('email','=',$request->email)->where('social_account_id','=',$request->social_account_id)->where('social_account_type','=',$request->social_account_type)->first();
        if($result) {
            $code = 406;
            $output = [
                'data' => $result,
                'message' => 'User Already Exists',
            ];
        }else{
            $code = 200;
            $output = [
                'message' => 'User not exsits',
            ];
        }
    return response()->json($output, $code);
}
public function getUserNotification(Request $request)
{
    $input = $request->only('page');
    $notification = request()->user()->unreadNotifications();
    $data =  $notification->paginate(10);
    $models = $data->items();
    $response = Helper::paginator($models, $data); 
    $pagination =$response['pagination'];
    unset($response['pagination']); 
    if($data->isNotEmpty()){
      $code = 200;
      $output = [
        'response' => [
            'data' => $response,
            'message' => 'success',
            'pagination' => $pagination,
        ]
      ];  
    }else{
       $code = 404;
       $output = [
        'response' => [
            'error' => 'no notification found'
        ]
      ];  
    }
    return response()->json($output, $code);
}
public function markRead(Request $request)
{ 
   return request()->user()->unreadNotifications->markAsRead();
}
}
