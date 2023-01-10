   
   @foreach ($options as $value => $label)
    <div class="d-flex">
    <div class="logo-type-tile">   
    <input type="radio" id="radio-{{ $loop->iteration }}" class="logo-type" value="{{ $value }}" {{ $isSelected($value) ? 'checked' : '' }} {{$attributes}} style="display: none;">
        <label for="radio-{{ $loop->iteration }}">
        <h3 class="basic logo-type-name">{{ $label }}</h3>
        </label>
    </div>
</div>
@endforeach



