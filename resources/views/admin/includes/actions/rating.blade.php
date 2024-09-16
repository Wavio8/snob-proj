@if (\App\Helpers\Admin\Helper::checkRights(\Request::url(), 'edit'))
    @php
        if (empty($field)) $field = 'rating';
    @endphp
    <input type='text' class='rating-change' value="{{ !empty($object->{$field}) ? $object->{$field} : '' }}" title="Рейтинг"
           data-id="{{ $object->id }}" data-field="{{ $field }}"
           data-class="{{ get_class($object) }}" placeholder='Рейтинг'>
@endif
