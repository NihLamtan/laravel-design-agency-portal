@component('mail::message')
# New Order


<strong>Package: </strong> {{ $order->service->category->name ?? '' }} - {{ $order->service->name ?? '' }} <br>
<strong>Amount: </strong> {{ $order->price }}<br>
<strong>Name: </strong> {{ $order->user->first_name ?? '' }} {{ $order->user->last_name ?? '' }}<br>
<strong>Email: </strong> {{ $order->user->email ?? '' }}<br>
<strong>Phone: </strong> {{ $order->user->phone ?? '' }}<br>
<strong>Payment Status: </strong> {{ $order->payment_status }}<br>

@component('mail::button', ['url' => route('admin.orders.index')])
View Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
