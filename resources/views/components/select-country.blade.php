<div>
    <select {{ $attributes->merge(['class' => 'form-control']) }}>
        @foreach($countries as $country_id => $country)
            <option value="{{ $country_id }}" {{ $attributes['value'] == $country_id ? 'selected' : '' }}>{{ $country }}</option>
        @endforeach
    </select>
</div>