@component('mail::message')
Your service provider profile request has been {{$status}}. Please click on the button provided below:
 
@component('mail::button', ['url' => $url])
GO TO PSM
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
