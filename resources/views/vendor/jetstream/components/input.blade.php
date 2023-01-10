@props(['disabled' => false])
<style>
    input {
        box-shadow: 7px;
    }
</style>

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input ']) !!}>
