<div>
    <select {{ $attributes->merge(['class' => 'form-control']) }}>
        <option value="">Select</option>
        @foreach($states as $state_code => $state)
            <option value="{{ $state_code }}" {{ $attributes['value'] == $state_code ? 'selected' : '' }}>{{ $state }}</option>
        @endforeach
    </select>
</div>