@if ($altPath ?? '')
    <a href="{{ route($altPath, $altParams ?? []) }}{{ \App\Helpers\Admin\Helper::getParams() }}" class="admin_edit"
        title="Редактировать"></a>
@else
    <a href="{{ route('admin.' . $path . '.edit', ['id' => $object->id ?? 0]) }}{{ \App\Helpers\Admin\Helper::getParams() }}"
        class="admin_edit" title="Редактировать"></a>
@endif
