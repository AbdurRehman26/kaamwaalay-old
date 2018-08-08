@component('mail::message')
You are receiving this email because we received a password reset request for your account.

If you did not request a password reset, no further action is required.
 
@component('mail::button', ['url' => $url])
RESET PASSWORD
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
