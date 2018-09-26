@component('mail::message')
Your profile request has been {{$status}}.
 
{{ $reason ? 'Reason : ' : ''}}
{{ $reason }}

<br>
Please click on the button provided below:

@component('mail::button', ['url' => $url])
GO TO PSM
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
