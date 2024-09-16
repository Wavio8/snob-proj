@if (!empty($allOption))
    @if ($allOption && $objects)
        <div class="search-checkboxes__item checkbox_block js-all_option">
            <label class="cbx">
                <input type="checkbox" class="inp-cbx all-option-input" name="all-option" hidden="hidden" value=""
                    @if ($allOption->checked ?? 0) checked="checked" @endif>
                <span class="cbx-body">
                    <svg width="12px" height="10px" viewBox="0 0 12 10">
                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                    </svg>
                </span>
                <span>
                    {{ $allOption->name ?? 'Все' }}
                </span>
            </label>
            @if (isset($textboxes) && $textboxes)
                <textarea name="search-textbox" id="" cols="10" rows="3">{{ $allOption->text ?? '' }}</textarea>
            @endif
        </div>
    @endif
@endif


@foreach ($objects as $value)
    <div class="search-checkboxes__item checkbox_block">
        <label class="cbx">
            <input type="checkbox" class="inp-cbx" name="search-checkbox" hidden="hidden" value="{{ $value->id }}"
                @if ($value->checked) checked="checked" @endif>
            <span class="cbx-body">
                <svg width="12px" height="10px" viewBox="0 0 12 10">
                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                </svg>
            </span>
            <span>

                @if ($name == 'users')
                    <i>ID: {{ $value->id ?? 0 }}</i> 
                    @if (!empty($value->lastname) || !empty($value->name) || !empty($value->middlename))
                        <i>ФИО:</i> {{ $value->lastname ?? '' }} {{ $value->name ?? '' }} {{ $value->middlename ?? '' }}
                        <br>
                    @endif
                    @if (!empty($value->email))
                        <i>Email:</i> {{ $value->email }}
                    @else
                        @if (!empty($value->phone))
                            <i>Телефон:</i> {{ $value->phone }}
                        @endif
                    @endif
                @else
                    {{ $value->name }}
                    <i>ID: {{ $value->id ?? 0 }}</i>
                @endif

            </span>
        </label>
        @if (isset($textboxes) && $textboxes)
            <textarea name="search-textbox" id="" cols="10" rows="3">{{ $value->text ?? '' }}</textarea>
        @endif
    </div>
@endforeach
