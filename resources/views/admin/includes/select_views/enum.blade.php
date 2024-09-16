<option value='{{ $value->name }}' {{ ($selected ?? '') == $value->name  ? 'selected' : '' }}>
    {{ $value }} 
</option>
