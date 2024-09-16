@if (\App\Helpers\Admin\Helper::checkRights(\Request::url(), 'edit'))
    <div class="filter">
        @php
            $params = '';
            if (empty($add_link) && empty($user_atr_id)) {
                $params = \App\Helpers\Admin\Helper::getParams();
            }
        @endphp
        @if ($altPath ?? '')
        
            <a href="{{ route($altPath, $altParams ?? []) }}{{ $add_link ?? '' }}{{ $params }}"
                class="admin_add">Добавление {{ $title[1] ?? '' }}</a>
        @else
            <a href="{{ route('admin.' . $path . '.edit') }}{{ $add_link ?? '' }}{{ $user_atr_id ?? '' }}{{ $params }}"
                class="admin_add">Добавление {{ $title[1] ?? '' }}</a>
        @endif
    </div>
@endif
