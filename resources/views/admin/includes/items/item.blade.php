@php
    if (empty($field)) $field = '';
@endphp

<div class="input_block {{ $table == 'catalog_chars_value' ? 'input_block_line' : '' }}">

    <input class="items-edit {{ !empty($input_class) ? $input_class : '' }}" type="text" name="items[]" value="{{ $item_value ?? '' }}"
        data-id="{{ $item_id ?? 0 }}"
        data-table="{{ $table ?? '' }}"
        data-type="{{ $type ?? '' }}" autocomplete="off" placeholder="{{ $placeholder ?? '' }}">

    @if (!empty($second))
        <input class="items-edit2" type="{{ $second == 'color' ? 'color' : 'text' }}" name="items2[]" value="{{ $item_value2 ?? '' }}"
            data-id="{{ $item_id ?? 0 }}"
            data-table="{{ $table ?? '' }}"
            data-type="{{ $type ?? '' }}" autocomplete="off" placeholder="{{ $placeholder2 ?? '' }}" title="{{ $placeholder2 ?? '' }}">
    @endif

    @if (!empty($third))
        <input class="items-edit3" type="text" name="items3[]" value="{{ $item_value3 ?? '' }}"
            data-id="{{ $item_id ?? 0 }}"
            data-table="{{ $table ?? '' }}"
            data-type="{{ $type ?? '' }}" autocomplete="off" placeholder="{{ $placeholder3 ?? '' }}" title="{{ $placeholder3 ?? '' }}">
    @endif

    @if ($table == 'catalog_chars_value')
        <div class="checkbox_block catalog-chars-item-check">
            <input type="checkbox" name="show_preview[]" id="{{ $table }}_show_preview_{{ $item_id }}" class="inp-cbx items-edit-checkbox" style="display: none;"
            value="1" data-id="{{ $item_id ?? 0 }}"  data-table="{{ $table ?? '' }}" data-field="show_preview" {{ !empty($item_show_preview) ? 'checked' : '' }}>
            <label class="cbx" for="{{ $table }}_show_preview_{{ $item_id }}">
                <span>
                    <svg width="12px" height="10px" viewBox="0 0 12 10">
                      <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                    </svg>
                </span>
            </label>
            Показывать на превью в карточке товара
        </div>
        @if ($field == 'brand')
             <div class="catalog-chars-brand-storage" title="Инструменты выбора товара">
                 Минимальное кол-во товара при котором товар выводится
                 <input class="items-edit2 input-number" type="text" name="items3[]" value="{{ $item_show_storage_count_min ?? '' }}"
                     data-id="{{ $item_id ?? 0 }}"
                     data-table="{{ $table ?? '' }}_brand"
                     data-type="{{ $type ?? '' }}" autocomplete="off" placeholder="Кол-во">
             </div>
        @endif
    @endif

    @if ($field <> 'picker')
        <div data-id="{{ $item_id ?? 0 }}" data-table="{{ $table ?? '' }}" data-type="{{ $type ?? '' }}" class="items-edit-delete" title="Удалить"></div>
    @endif

    @if (!empty($values))
        <div class="items-values">
            @foreach ($values AS $value)
                <div class="items-value">{{ $value->name }}</div>
            @endforeach
        </div>
    @endif

</div>
