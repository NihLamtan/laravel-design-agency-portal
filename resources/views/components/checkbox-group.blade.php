    @foreach ($options as $value => $label)
        
    <div class="logo-type-tile">

    <input type="checkbox" id="checkbox-{{ $loop->iteration }}"   value="{{ $value }}"  {{ $isSelected($value) ? 'checked' : '' }}  {{$attributes}} style="display: none;">
    
        <label for="checkbox-{{ $loop->iteration }}">
        <h3 class="basic logo-type-name">{{ $label }}</h3>
        </label>
    </div>

    @endforeach  

