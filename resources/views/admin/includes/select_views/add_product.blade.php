<option value='{{ $value->id }}' {{ ($selected ?? '') == $value->id ? 'selected' : '' }}>
    ID: {{ $value->id }} |
    {{ $value->name }}
    @if ($value->notavaliableToAdd ?? '')
        | (НЕТ НА СКЛАДЕ)
    @endif
</option>
