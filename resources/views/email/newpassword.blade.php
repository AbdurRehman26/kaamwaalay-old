@component('mail::message')
# Hi Muhammad Rashid

You recently requested to reset your password for your account, use the button below to reset it.

@component('mail::button', ['url' => ''])
Reset Password
@endcomponent

<strong>Thanks,<br>
PSI, Pakistan</strong><br>
@endcomponent
