@component('mail::message')
# Congratulations {{ $user->first_name ." ". $user->last_name}}! Your account has been successfully created.
 
<div>
    We're excited to welcome you to to {{ config('app.name') }}.
</div>

@component('mail::button', ['url' => $url])
Login Now
@endcomponent

<strong>Thanks,<br>
{{ config('app.name') }}.</strong>
@endcomponent
