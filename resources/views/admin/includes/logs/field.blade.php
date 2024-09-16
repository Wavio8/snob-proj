@if (!empty($name) && !empty($label))
    <input type="hidden" name="logs_field[]" value="{{ $name ?? '' }}~{{ $label ?? '' }}~{{ $include_type ?? '' }}">
@endif
