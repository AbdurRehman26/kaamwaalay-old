@component('mail::message')
# Congratulations {{ $user->first_name ." ". $user->last_name}}! Your account has been successfully created.
 
<div>
    We're excited to welcome you to {{ config('app.name') }}. To activate your account please click on the button provided below.
</div>

@component('mail::button', ['url' => $url])
ACTIVATE NOW
@endcomponent

<strong>Thanks,<br>
{{ config('app.name') }}.</strong>
@endcomponent
