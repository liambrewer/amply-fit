<x-mail::message>
# Login Link

Please use the link below to log into the {{ config('app.name') }} application.

<x-mail::button :$url>
Login
</x-mail::button>

The above link will expire in 10 minutes.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
