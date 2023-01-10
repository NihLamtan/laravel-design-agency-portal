@component('mail::message')
# Introduction

Refund requested successfully! We will get back to you within 24 hours!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
