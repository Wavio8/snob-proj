<div class="input_block">
    <span>{!! $label ?? '' !!}</span>
    <textarea class="{{ $class ?? '' }}" rows="{{$rows ?? ''}}" type="text" name="{{ $name ?? '' }}" {{ $required ?? '' }} maxlength="800">{{ $value ?? '' }}</textarea>
    @if (!empty($help))
        <small class="help-textarea">{{ $help }}</small>
    @endif
    @include('admin.includes.logs.field')
</div>
