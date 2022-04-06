@component('mail::message')
# Nuovo messaggio

<p>**Email:** {{ $contact['email'] }}</p>

<p>**Message:** {{ $contact['message'] }}</p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
