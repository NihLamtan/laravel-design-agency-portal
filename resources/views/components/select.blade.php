<select class="form-control multiSelect"  multiple="multiple"  style="margin-bottom: 20px;" name="instructions[Your Target Audience?]">
    <option value="" disabled>{{$title}}</option>
    @foreach($options as $value => $label)
        <option value="{{$value}}" {{ $isSelected($value) ? 'selected' : '' }}>{{ $label }}</option>
    @endforeach
</select>