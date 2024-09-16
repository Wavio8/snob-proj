@include('admin.layouts.head')

<main class='login_bg'>

    <div class='login_dialog'>
        <h1>Авторизация</h1>

        <form action='/admin/login' method='post' id='login_form'>
            @csrf
            <div class='input_block'>
                <span>Логин:</span>
                <input type='text' name='email'>
            </div>

            <div class='input_block'>
                <span>Пароль:</span>
                <input type='password' name='password'>
            </div>

            {{--            @if(isset($errors))--}}
            {{--                {{dd($errors->all())}}--}}
            {{--            @endif--}}

            <div class='input_block'>
                <button type='submit' name='submit'>Войти</button>
            </div>

        </form>

    </div>

</main>

@include('admin.layouts.footer')
