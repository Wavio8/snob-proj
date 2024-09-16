<input type='radio' name='{{ $name }}' id='radio_{{ $name }}_{{ $i }}'
    value='{{ $value->name }}' @php if ($checked && $value->name == $checked) echo 'checked' @endphp>
<label for='radio_{{ $name }}_{{ $i }}'>{{ $value->value }}</label>
