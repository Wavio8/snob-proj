<div class='input_block'>

    @if ($title ?? '')
        <span>{{ $title }}:</span>
    @endif


    <div class='radio_block'>
        @php $i = 1; @endphp
        @foreach ($items as $value => $label)
            @if ($view ?? '')
                @include($view, ['neme' => $name, 'value' => $label, 'i' => $i ,'checked'=>$checked ])
            @else
                <input type='radio' name='{{ $name }}' id='radio_{{ $name }}_{{ $i }}'
                    value='{{ $value }}' @php if ($checked && $value == $checked) echo 'checked' @endphp>
                <label for='radio_{{ $name }}_{{ $i }}'>{{ $label }}</label>
            @endif
            @php $i++; @endphp
        @endforeach
    </div>
    @include('admin.includes.logs.field', ['label' => $title])
</div>
