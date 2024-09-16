@if (\App\Helpers\Admin\Helper::checkRights(\Request::url(), 'delete') &&  $object->id)
    <div class="input_block">
        <a href="{{ route('admin.' . $path . '.index') }}?delete={{ $object->id ?? 0 }}" class="admin_delete_inside button button-red"
            title="{{ $delete_title ?? 'Удалить' }}">Удалить</a>
    </div>
@endif
