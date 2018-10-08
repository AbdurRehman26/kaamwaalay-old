<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function sendResetLinkResponse($response)
    {
         $output = ['data' => [],'message'=> trans($response)];
        // HTTP_OK = 200;
        return response()->json($output, Response::HTTP_OK);
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        throw ValidationException::withMessages(
            [
            'email' => [trans($response)],
            ]
        );
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {

        $this->validateEmail($request);
        $userRepo = app('UserRepository');
        $user =$userRepo->findByAttribute('email', $request->email);
        if(!empty($user->social_account_id)) {
            return $this->sendInvalidUserResponse($request);
        }
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
        ? $this->sendResetLinkResponse($response)
        : $this->sendResetLinkFailedResponse($request, $response);
    }

    protected function sendInvalidUserResponse(Request $request)
    {  
        throw ValidationException::withMessages(
            [
            'email' => [Lang::get('auth.invalidFogotUser')],
            ]
        );
    }
}
