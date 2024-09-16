@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">

        <div class="admin_edit-links">
            <a href="{{ route('admin.users.users.index') }}">Назад к списку</a>
        </div>


        <form method="post" class="admin_edit-form" enctype="multipart/form-data">

            @csrf

            @php
                $type_user = !empty($type) ? '' : 'admin-box-hide';
                $type_client = !empty($type) ? 'admin-box-hide' : '';
            @endphp

            <div class="{{ $type_user }}">
                @include('admin.includes.info', [
                    'label' => 'Дата подтверждения телефона:',
                    'value' => !empty($object->phone_verified_at)
                        ? date('d.m.Y H:i', strtotime($object->phone_verified_at))
                        : 'пока не подтверждён',
                ])
                @include('admin.includes.info', [
                    'label' => 'Дата подтверждения почты:',
                    'value' => !empty($object->email_verified_at)
                        ? date('d.m.Y H:i', strtotime($object->email_verified_at))
                        : 'пока не подтверждён',
                ])
            </div>

            <fieldset class="{{ $type_client }}">
                <legend>Класс и тип пользователя</legend>
                @include('admin.includes.select', [
                    'label' => 'Класс пользователя:',
                    'name' => 'class',
                    'value' => $object->class ?? 3,
                    'select' => $select_user_class,
                    'first_not_show' => true,
                ])
            </fieldset>

            <fieldset>
                <legend>Основные данные</legend>
                <div class="column-items column-items2">
                    <div class="column-item">
                        @include('admin.includes.input', [
                            'label' => 'Email:',
                            'name' => 'email',
                            'value' => $object->email ?? '',
                            'required' => 'required',
                        ])
                        @if (session('message_email'))
                            <div class="error">{!! session('message_email') !!}</div>
                        @endif
                    </div>
                    <div class="column-item {{ $type_client }}">
                        <div class="input_block">
                            <span>{{ !empty($object->id) ? 'Новый пароль' : 'Пароль' }}:</span>
                            <input type="password" name="password" value="" autocomplete="new-password">
                        </div>
                    </div>
                </div>


            </fieldset>


            @include('admin.includes.submit')
        </form>
    </div>
@endsection
