@if ($i % 2 !== 0 || $i === 1)
    <div class="row-2">
@endif
<div class="col">
    <input type='radio' name='{{ $name }}' id='radio_{{ $name }}_{{ $i }}'
        value='{{ $value->id }}' @php if ($checked && $value->id == $checked) echo 'checked' @endphp>
    <label for='radio_{{ $name }}_{{ $i }}'>{{ $value->name }}</label>
</div>

@if ($i % 2 === 0 && $i !== 1)
    </div>
    <br>
@endif
