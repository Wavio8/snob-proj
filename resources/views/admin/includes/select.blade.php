<div class="input_block">
    <span>{{ $label ?? '' }}</span>

    @if (!empty($select))
        @php
            $values = '^';
        @endphp


        <select name='{{ $name ?? '' }}' class='chosen {{ $class ?? '' }}' {{ isset($required) ? 'required' : '' }}>

            @if (empty($first_not_show))
                <option value='0'>{{ !empty($select_head) ? $select_head : 'Не выбрано' }}</option>
            @endif

            @foreach ($select as $key => $option)
                @if ($view ?? '')
                    @include($view, [
                        'neme' => $name,
                        'key' => $key,
                        'value' => $option,
                        'selected' => $value,
                    ])
                @else
                    @php
                        $option_value = (!empty($value_name) ? $option->$value_name : null) ?? ($option->id ?? 0);
                        $content = '';
                        if ($name == 'user' || $name == 'user_order') {
                            $content .= 'ID: ' . ($option->id ?? '');
                            if (!empty($option->phone)) {
                                $content .= ' | Телефон: ' . $option->phone;
                            }
                            if (!empty($option->email)) {
                                $content .= ' | Email: ' . $option->email;
                            }
                            if (!empty($option->lastname) || !empty($option->name) || !empty($option->middlename)) {
                                $content .= ' | ФИО: ' . ($option->lastname ?? '') . ' ' . ($option->name ?? '') . ' ' . ($option->middlename ?? '');
                            }
                        } else {
                            $content .= (isset($name_name) ? $option->$name_name : null) ?? ($option->name ?? '');
                           
                        }
                        $content .= !$content ?? $option->title ?? '';
                        $values .= $option_value . '~' . $content . '^';
                    @endphp

                    <option value='{{ $option_value }}'
                        {{ ($value ?? '') == ((!empty($value_name) ? $option->$value_name : null) ?? $option->id) ? 'selected' : '' }}>
                        @if (!empty($show_id))
                            ID: {{ $option->id }} |
                        @endif
                        {{ $content }}
                    </option>
                @endif
            @endforeach
        </select>
        @include('admin.includes.logs.field', ['include_type' => 'select'])
        <textarea name="logs_field_select_{{ $name }}" style="display: none;">{{ $values }}</textarea>
    @endif
</div>
