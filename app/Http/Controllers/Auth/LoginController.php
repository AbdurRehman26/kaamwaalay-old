<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Data\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Data\Models\User;
use App\Data\Models\Role;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Lang;
use Carbon\carbon;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
     /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $_userRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $repository)
    {
      $this->_userRepository  = $repository;
      $this->middleware('guest')->except('logout');
    }
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();

            // Make sure the user is active
            if ($user->status == User::ACTIVE && $this->attemptLogin($request)) {
                // Send the normal successful login response
                return $this->sendLoginResponse($request);
            }else if($user->status == User::PENDING){
                // Increment the failed login attempts and redirect back to the
                // login form with an error message.
                $this->incrementLoginAttempts($request);
                return $this->sendPendingLoginResponse($request);
            } else {
                // Increment the failed login attempts and redirect back to the
                // login form with an error message.
                $this->incrementLoginAttempts($request);

                return $this->sendBlockedLoginResponse($request);
            }
        }
        return $this->sendFailedLoginResponse($request);
    }
      /**
     * Handle a admin login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function adminLogin(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();
            // Make sure the user is active
            if ($user->status == User::ACTIVE && $this->attemptLogin($request) && $user->role_id == Role::ADMIN) {
                // Send the normal successful login response
                return $this->sendLoginResponse($request);
            }else if($user->status == User::PENDING){
                // Increment the failed login attempts and redirect back to the
                // login form with an error message.
                $this->incrementLoginAttempts($request);
                return $this->sendPendingLoginResponse($request);
            } else if($user->role_id != Role::ADMIN){
                // Increment the failed login attempts and redirect back to the
                // login form with an error message.
                $this->incrementLoginAttempts($request);
                return $this->sendCheckAdminLoginResponse($request);
            } else {
                // Increment the failed login attempts and redirect back to the
                // login form with an error message.
                $this->incrementLoginAttempts($request);

                return $this->sendBlockedLoginResponse($request);
            }
        }
        return $this->sendFailedLoginResponse($request);
    }
    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        $data =  $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());      
        $output = ['access_token'=>$data->access_token, 'response' => ['data' => [$data],'message'=>'Success']];

        // HTTP_OK = 200;
        return response()->json($output, Response::HTTP_OK);
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $scopes = (Role::find($user->role_id)->scope)?json_decode(Role::find($user->role_id)->scope):[];
        $user->access_token = $token = $user->createToken('Token Name',$scopes)->accessToken;
        return $user;
    }
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
       $user = $request->user();
       $user->token()->revoke();
       return redirect('/');
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendBlockedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.blocked')],
        ]);
    }
    protected function sendPendingLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.pending')],
        ]);
    }

    public function activateUser(Request $request) {
        $input=$request->only('token');
        if(!empty($input['token'])) {
            $user = new User();
            $validated = $user->where('activation_key', $input['token'])->first();
            if ($validated) {
                $data =[
                  "id" => $validated->id ,
                  "activation_key" => '' ,
                  "status" => User::ACTIVE ,
                  "activated_at" => Carbon::now() ,
                ];
                if($this->_userRepository->update($data)){
                    return view('layout',['success'=>Lang::get('auth.activateSuccess'),'token'=>$input['token']]);
                }
                return view('layout',['error'=>Lang::get('auth.activateError')]);
            } else {
                return view('layout',['error'=>Lang::get('auth.activateError')]);
            }

        }
    }
    protected function sendCheckAdminLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.adminLogin')],
        ]);
    }
}
