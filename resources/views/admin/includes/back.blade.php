<div class="admin_edit-links">
    @if ($altPath ?? '')
        {{-- <a href="{{ route($altPath, $altParams ?? [] ) }}"></a> --}}
        <a href="{{ route($altPath, $altParams ?? []) }}{{ $add_link ?? '' }}{{ $params ?? '' }}">Назад
            к списку</a>
    @elseif (!empty($site_link))
        <a href="{{ $site_link }}" target="_blank">Смотреть на сайте</a>
    @else
        <a href="{{ route('admin.' . $path . '.index') }}{{ \App\Helpers\Admin\Helper::getParams() }}">Назад к списку</a>
    @endif
</div>
