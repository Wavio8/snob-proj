@php
    $content = "$value->name";
@endphp

<option value='{{ $value->id }}' {{ ($selected ?? '') == $value->id ? 'selected' : '' }}>
    {{ $content }}
</option>
