@include('admin.layouts.header')
@csrf
<div class='admin_panel'>
    <aside class='admin_nav active'>
        <nav class='admin_scroll'>
            <div class="collapse-btn"></div>
            @include('admin.utility.links')
        </nav>

        <div class='admin_copyright'>
            <span>&copy; 2011 - {{ date('Y') }} VisualTeam Ltd. Co.</span>
        </div>

    </aside>

    <div class='admin_content admin_scroll @yield('wrapper', '')'>
        @yield('content')
    </div>

</div>

<div class="dialog">
    <div class="dialog__body">
        <button type="button" class="dialog__close"></button>
        <div class="dialog__content"></div>
    </div>
</div>

@if (\App\Helpers\Admin\Helper::checkRights(\Request::url(), 'edit'))
    <div class="button save">Сохранить</div>
@endif

@include('admin.layouts.footer')

@yield('custom_script')
