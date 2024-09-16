@include('admin.layouts.head')

@php $user = auth()->user(); @endphp
<header class='admin_header'>

    <div class='admin_logo'>
        <a href='/' target='_blank'>
            <img src='' alt=''>сайт
        </a>
    </div>

    <div class='admin_control'>
        <span>Вы вошли как: <b>{{ $user->email }}</b></span>
        <a href='/admin/logout' class='admin_logout'>Выйти</a>
    </div>

</header>

@if ($message = session()->get('message'))
    <div class='notice'>
        <div id='black'></div>
        <div id='alert'>
            <div class='alert_head'>Уведомление</div>
            <span class='alert_text'>{{ $message }}</span>
            <button type='button' class='button_alert'>ОК</button>
        </div>
    </div>
@endif
