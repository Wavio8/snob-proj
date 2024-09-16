<div class="input_block">
    @foreach ($fields as $key => $field)
        @switch($field->type)
            @case('input')
                <input data-index={{ $key }} data-id="{{ $item->id }}" class="items2-edit" type="text"
                    name="items_obj_{{ $object ?? '' ? $object->id : $id }}_item_{{ $item->id }}#{{ $field->name }}"
                    value="{{ $item->{$field->name} ?? '' }}" autocomplete="off" placeholder="{{ $field->placeholder }}">
            @break

            @case('select')
                @php
                    $objID = $object ?? '' ? $object->id : $id;
                    $name = 'items_obj_' . $objID . '_item_' . $item->id . '#' . $field->name;

                    $class = 'items2-edit' . ($field->refreshafterchange ?? '' ? ' items2-refresh' : '');

                    $view = $field->view ?? '';
                    $cv = $field->checkedValues ?? '';
                    $at = $field->accessTables ?? '';

                    if ($field->selectTable) {
                        $table = $field->selectTable;
                    } else {
                        if ($cv && array_key_exists($item->id, $cv) && $cv[$item->id] && $at) {
                            $table = $field->accessTables->{$cv[$item->id]}->fields;
                        } else {
                            $table = [];
                        }
                    }

                    $table = json_decode(json_encode($table), true);

                @endphp
                @include('admin.includes.select_views.select', [
                    'label' => '',
                    'name' => $name,
                    'value' => $item->{$field->name} ?? '',
                    'select' => $table,
                    'view' => $view,
                    'class' => $class,
                    'data' => 'data-id="' . $item->id . '"' . ' data-index="' . $key . '"',
                ])
            @break

            @default
        @endswitch
    @endforeach


    <div data-id="{{ $item->id }}" class="delete-icon items2-delete" title="Удалить"></div>


</div>
