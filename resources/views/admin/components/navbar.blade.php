@php
    $access = auth()->user()->sudo;
    if (!$all && !$access) {
        $rights = auth()
            ->user()
            ->user_class->rights()
            ->where('type', 'read')
            ->get();
        if ($rights && !$access) {
            foreach ($rights as $right) {
                $right_url = route('admin.' . $right->path . '.index');
                if (mb_stripos($right_url, $url)) {
                    $access = true;
                    break;
                }
            }
        }
    }
@endphp
@if ($access || $all)
    <div class="admin_nav_group" data-url="{{ $url }}">
        <div class="admin_nav_title js-admin_nav_title">{{ $title }}</div>
        <div
            class="admin_nav_pages {{ Request::is('*/' . $url . '/*') ? 'admin_nav_pages_show' : '' }} js-admin_nav_pages">
            {{ $slot }}
        </div>
    </div>
@endif
