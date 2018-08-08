@component('mail::message')
Your account has been successfully created. To activate your account, please click on the button provided below:
 
@component('mail::button', ['url' => $url])
ACTIVATE
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
