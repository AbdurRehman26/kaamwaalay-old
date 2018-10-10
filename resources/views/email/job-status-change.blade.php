@component('mail::message')
{{$message}}.


<br>
Please click on the button provided below:

@component('mail::button', ['url' => $url])
GO TO {{ config('app.name') }}
@endcomponent

<strong>Thanks,<br>
{{ config('app.name') }}.</strong>
@endcomponent


