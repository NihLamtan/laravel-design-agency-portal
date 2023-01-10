@component('mail::message')
# Welcome to Logo in Usa

Thank you for connecting with use here are your credentials to manager your account.

<strong>Url:</strong> {{ url('/login') }}
<strong>Email:</strong> {{ $user->email }}
<strong>Password:</strong> {{ $password }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
