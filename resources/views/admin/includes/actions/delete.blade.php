@if (\App\Helpers\Admin\Helper::checkRights(\Request::url(), 'delete'))
    <a href="?delete{{ $postfix ?? '' }}={{ $itemID ?? $object->id ?? 0 }}" class="admin_delete" title="{{ $delete_title ?? 'Удалить' }}"></a>
@endif
