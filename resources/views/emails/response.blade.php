@component('mail::message')
    # Contact Email notification

    TY for your message, we will get back to you as soon as possible.

    Best regards,<br>
    {{ config('app.name') }}
    <img src="{{ secure_asset('img/Logo-White-New@2x-1024x198.png') }}" alt="logo">
@endcomponent
