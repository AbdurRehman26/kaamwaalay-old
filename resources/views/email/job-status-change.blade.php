@component('mail::message')
<?php
echo strip_tags($message,'<strong>');
?>


<br>
Please click on the button provided below:

@component('mail::button', ['url' => $url])
GO TO {{ strtoupper(config('app.name')) }}
@endcomponent

<strong>Thanks,<br>
{{ config('app.name') }}.</strong>
@endcomponent


