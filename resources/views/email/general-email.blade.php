
@component('mail::message')
# Congratulations Muhammad Rashid! Your account has been successfully created.
 
<div>
    We're excited to welcome you to to PSM.
</div>

@component('mail::button', ['url' => ''])
Login Now
@endcomponent

<strong>Thanks,<br>
Professional Service Marketplace.</strong>
@endcomponent

