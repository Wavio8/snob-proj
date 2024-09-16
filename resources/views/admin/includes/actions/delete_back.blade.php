@if (\App\Helpers\Admin\Helper::checkRights(\Request::url(), 'delete'))
    <a href="?delete_back={{ $object->id ?? 0 }}" class="admin_delete_back" title="{{ $delete_title ?? 'Вернуть' }}"></a>
@endif
