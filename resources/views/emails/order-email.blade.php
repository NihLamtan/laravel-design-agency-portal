@component('mail::message')
# Thank you for choosing us

## Dear {{ $order->user->first_name ?? '' }}

Thank you for your order. we will get back to you shortly.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
