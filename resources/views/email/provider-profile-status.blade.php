@component('mail::message')
# Hi {{ $user->first_name ." ". $user->last_name}},

Your profile request has been {{$status}}.
 
{{ $reason ? 'Reason : ' : ''}}
{{ $reason }}

<br>
Please click on the button provided below:

@component('mail::button', ['url' => $url])
GO TO {{ strtoupper(config('app.name')) }}
@endcomponent

<strong>Thanks,<br>
{{ config('app.name') }}.</strong>
@endcomponent