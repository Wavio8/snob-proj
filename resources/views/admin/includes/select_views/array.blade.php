<option value='{{ $key }}' {{ ($selected ?? '') == $key ? 'selected' : '' }}>
    {{ $value['label'] ?? $value }} 
</option>
