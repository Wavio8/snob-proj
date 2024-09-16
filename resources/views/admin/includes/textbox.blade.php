<div class="input_block">
    <span>{{ $label ?? '' }}</span>
    <textarea name="{{ $name ?? '' }}" class="editor {{$class ?? ''}}" id="editor_{{ $name ?? '' }}">{{ $value ?? '' }}</textarea>
    @include('admin.includes.logs.field')
</div>
