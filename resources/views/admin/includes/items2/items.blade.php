@if (!empty($object->id))
    <fieldset class="items2" data-id="{{ $object->id }}" data-relaitive="{{ json_encode($relaitive) }}"
        data-target="{{ $targetModel }}" data-fields="{{ json_encode($targetTableFields) }}">
        <legend>{{ $label ?? '' }}</legend>
        <div class="items">
        </div>
        <br>
        <div class="button items2-add">
            Добавить
        </div>
    </fieldset>
@endif
