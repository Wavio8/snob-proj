<div class="checkbox_block_wrap">
    <div class="checkbox_block">
        <input type="checkbox" name="{{ $name ?? '' }}"
               id="checkbox_{{ $id ?? $name }}" class="inp-cbx" style="display: none;"
               value="1" {{ !empty($value) ? 'checked' : '' }}>
        <label class="cbx" for="checkbox_{{ $id ?? $name }}">
            <span>
                <svg width="12px" height="10px" viewbox="0 0 12 10">
                  <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                </svg>
            </span>
            <span>{!! $label ?? '' !!}</span>
        </label>
    </div>
    @include('admin.includes.logs.field')
</div>
