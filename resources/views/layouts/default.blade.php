<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- @yield('robots', '') --}}
@include('layouts.head')

<body class="body1">
    @include('layouts.header')
    @csrf
    @yield('content')
    @include('layouts.footer')
{{--    @include('includes.forms.team')--}}

</body>

</html>
