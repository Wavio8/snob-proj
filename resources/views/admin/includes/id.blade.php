@if (!empty($object->id))
    @include('admin.includes.info', ['label' => 'ID:', 'value' => $object->id ?? ''])
@endif
