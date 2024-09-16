@if (!empty($object))
    <input type='{{ $type ?? 'hidden' }}' class='rating-change' value="{{ $object->rating ?? 0 }}"
        data-id="{{ $object->id ?? 0 }}"
        data-class="{{ get_class($object) }}" placeholder='Рейтинг'>
@endif
