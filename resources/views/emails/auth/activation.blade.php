@component('mail::message')
# Please activate your account

Click on the 'Activate' button below or copy/paste the following url to your browser:<br/>

{{ route('activation.activate', $token) }}

@component('mail::button', ['url' => route('activation.activate', $token)])
Activate
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
