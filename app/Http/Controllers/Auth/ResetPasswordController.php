<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Data\Repositories\UserRepository;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
    public function __construct( UserRepository $repository)
    {
        $this->middleware('guest');
         $this->_userRepository  =$repository;

    }

    protected function sendResetResponse($response)
    {
        $output = ['response' => trans($response)];
        return response()->json($output, Response::HTTP_OK);
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        $output = ['response' => trans($response)];
        return response()->json($output, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $status = $user->status;
        if($user->status != -1){
            $status  = 1;
        }
        $user->password = Hash::make($password);
        $user->setRememberToken(Str::random(60));
        $user->save();
       $this->_userRepository->update(['id'=>$user->id , 'status'=>$status]);
        event(new PasswordReset($user));
        $this->guard()->login($user);
    }
}
