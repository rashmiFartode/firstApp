@component('mail::message')
# Welcome

Welcome to {{ config('app.name') }}<br>
Your registration has successfully done. 

Thanks,<br>
{{ config('app.name') }}
@endcomponent
