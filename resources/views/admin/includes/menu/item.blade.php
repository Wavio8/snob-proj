@if (!empty($route) && !empty($name))
    @php

        try {
            $route_url = route($route, false, false);
        } catch (\Throwable $th) {
           return;
        }

        $route_url = trim($route_url, '/');
        $access = isset($all) && $all ? true : \App\Helpers\Admin\Helper::checkRights(route($route), 'read');

        $active = false;
        if (Request::is($route_url . '/*') || Request::is($route_url)) {
            $active = true;
        }

        if ($name == 'Клиенты' && empty($_GET['type'])) {
            $active = false;
        }
        if ($name == 'Пользователи' && !empty($_GET['type'])) {
            $active = false;
        }
    @endphp
    @if ($access)
        <a href="{{ route($route) }}@if (isset($get_params)) ?@foreach ($get_params as $get_param => $get_value){{ $get_param . '=' . $get_value }}@endforeach @endif"
            class="{{ $active ? 'active' : '' }}">
            {{ $name }}
        </a>
    @endif
@endif
