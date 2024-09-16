<div class="search-checkbox">
    <div class="checkbox_block">
        <input type="checkbox" name="{{ $name ?? '' }}" id="search_{{ $name ?? '' }}" class="inp-cbx" form="filter_form" style="display: none;" value="1"
            {{ !empty($value) ? 'checked=checked' : '' }}>
        <label class="cbx" for="search_{{ $name ?? '' }}">
            <span>
                <svg width="12px" height="10px" viewbox="0 0 12 10">
                  <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                </svg>
            </span>
            <span>{{ $label ?? '' }}</span>
        </label>
    </div>
</div>
