@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">

        <div class="admin_edit-links">
            <a href="{{ route('admin.' . $PATH . '.index') }}">Назад к списку</a>
        </div>

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">

            @csrf
            @include('admin.includes.checkbox', [
                'label' => 'Скрыть',
                'name' => 'hide',
                'value' => $object->hide ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Название:',
                'name' => 'name',
                'value' => $object->name ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Заголовок:',
                'name' => 'title',
                'value' => $object->title ?? '',
            ])
               @include('admin.includes.textbox', [
                'label' => 'Текст:',
                'name' => 'text',
                'value' => $object->text ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Ссылка (автоматически):',
                'name' => 'url',
                'value' => $object->url ?? '',
            ])

            @include('admin.includes.images.gallery', [
                'title' => 'Галлерея',
                'name' => 'gallery',
                'path' => '',
                'images' => $object->images(),
            ])

            @include('admin.includes.input', [
                'label' => 'Рейтинг (для сортировки):',
                'name' => 'rating',
                'value' => $object->rating ?? '',
                'class' => 'input-number',
            ])

            @include('admin.includes.submit')
        </form>

    </div>
@endsection
