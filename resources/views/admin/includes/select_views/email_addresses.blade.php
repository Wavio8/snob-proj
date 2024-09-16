@php
    $content = "$value->name  ($value->email)";
@endphp

<option value='{{ $value->id }}' {{ ($selected ?? '') == $value->id ? 'selected' : '' }}>
    {{ $content }}
</option>
