<fieldset
    class="checkbox-multiple {{ !empty($search_show) ? 'checkbox-multiple-search-wrap' : '' }} {{ !empty($compact) ? 'checkbox-multiple-compact' : '' }}">
    <legend>{{ $label ?? '' }}</legend>
    <div class="input_block">
        @if (!empty($list))
            @php
                if (empty($field)) {
                    $field = 'name';
                }

                $value = trim($value, '|');
                $array = explode('|', $value);

                $all = false;
                if (in_array(0, $array) || empty($array) || empty($value)) {
                    if (empty($all_default_off)) {
                        $all = true;
                    }
                }

                $id = 'checkbox_' . $name . '_0' . md5(uniqid(rand(), true));
            @endphp

            @if (!empty($search_show))
                <input class="checkbox-multiple-search" type="text" value=""
                    placeholder="Поиск по названию или id...">
                <div class="checkbox-multiple-search-not-found">Ничего не найдено</div>
            @endif

            @if (empty($all_btn_off))
                <div class="checkbox_block checkbox_block_all">
                    <input type="checkbox" name="{{ $name }}[]" id="{{ $id }}"
                        class="inp-cbx checkbox-multiple-block-all" style="display: none;" value="0"
                        {{ $all ? 'checked' : '' }}>

                    <label class="cbx" for="{{ $id }}">
                        <span>
                            <svg width="12px" height="10px" viewbox="0 0 12 10">
                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                            </svg>
                        </span>
                        <span>Все</span>
                    </label>
                </div>
            @endif

            <div class="checkbox_block checkbox_block_not_selected"
                style="{{ !empty($not_selected) ? '' : 'display: none;' }}">
                <input type="checkbox" name="{{ $name }}[]" id="not_selected_{{ $id }}"
                    class="inp-cbx checkbox-multiple-block-not-selected" style="display: none;" value="-1"
                    {{ in_array(-1, $array) ? 'checked' : '' }}>

                <label class="cbx" for="not_selected_{{ $id }}">
                    <span>
                        <svg width="12px" height="10px" viewbox="0 0 12 10">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                    </span>
                    <span>Не выбрано</span>
                </label>
            </div>

            <div class="checkbox-multiple-items">
                @foreach ($list as $key => $item)
                    @php
                        if (gettype($item) !== gettype('')) {
                            $id = $item->id;
                            $index = 'checkbox_' . $name . '_' . $loop->iteration . '_' . $id;
                        } else {
                            $index = 'checkbox_' . $name . '_' . $loop->iteration . '_' . $key;
                            $id = $key;
                        }
                    @endphp
                    <div class="checkbox_block checkbox-multiple-item">
                        <input type="checkbox" name="{{ $name }}[]" id="{{ $index }}"
                            class="inp-cbx checkbox-multiple-block" style="display: none;" value="{{ $id }}"
                            {{ in_array($id, $array) || $all ? 'checked' : '' }}>

                        <label class="cbx" for="{{ $index }}">
                            <span>
                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                </svg>
                            </span>
                            <span>
                                <b class="checkbox-multiple-search-name">
                                    @if ($name == 'users')
                                        ID: {{ $id ?? '' }}
                                        @if (!empty($item->phone))
                                            | Телефон: {{ $item->phone }}
                                        @endif
                                        @if (!empty($item->email))
                                            | Email: {{ $item->email }}
                                        @endif
                                        @if (!empty($item->lastname) || !empty($item->name) || !empty($item->middlename))
                                            | ФИО: {{ $item->lastname ?? '' }} {{ $item->name ?? '' }}
                                            {{ $item->middlename ?? '' }}
                                        @endif
                                    @elseif($name == 'faq')
                                        {{ $item->{$field} ?? '' }}
                                    @else
                                        @if (gettype($item) !== gettype(''))
                                            {{ $item->{$field} ?? '' }}
                                        @else
                                            {{ $item ?? '' }}
                                        @endif
                                    @endif
                                </b>
                                <i class="checkbox-multiple-short">
                                    @if (!empty($short))
                                        ({{ $item->{$short} ?? '' }})
                                    @endif
                                </i>
                                @if (!empty($search_show) && $name != 'users')
                                    <i
                                        class="checkbox-multiple-short checkbox-multiple-search-id">ID:{{ $id ?? '' }}</i>
                                @endif
                            </span>
                        </label>

                        @if (!empty($sorting_show))
                            <div class="checkbox-multiple-arrows">
                                <div class="checkbox-multiple-arrow-up" title="Переместить выше"></div>
                                <div class="checkbox-multiple-arrow-down" title="Переместить ниже"></div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</fieldset>
