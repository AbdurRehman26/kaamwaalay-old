@component('mail::message')
Your account has been created by Admin. To set your password, please click on the button provided below:
 
@component('mail::button', ['url' => $url])
SET YOUR PASSWORD
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
