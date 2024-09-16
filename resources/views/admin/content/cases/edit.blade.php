@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.h1')
    <div class="admin_edit_block">
        @include('admin.includes.back')
        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf
            @include('admin.includes.input', [
                'label' => 'Заголовок:',
                'name' => 'title',
                'value' => $object->title ?? '',
            ])
            @include('admin.includes.textbox', [
                'label' => 'Текст',
                'name' => 'text',
                'value' => $object->text ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Название компании:',
                'name' => 'company',
                'value' => $object->company ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Подпись:',
                'name' => 'qute',
                'value' => $object->qute ?? '',
            ])
            @include('admin.includes.images.image', [
                'title' => 'Логотип компании:',
                'name' => 'logo',
                'object' => $object,
                'path' => '/storage/' . $object->logo,
            ])
            @include('admin.includes.input', [
                'label' => 'Дата выполнения:',
                'name' => 'date',
                'value' => $object->date ?? '',
            ])


            @include('admin.includes.images.image', [
                'title' => 'Картинка:',
                'name' => 'image',
                'object' => $object,
                'path' => '/storage/' . $object->image,
            ])

            @include('admin.includes.submit')

        </form>

    </div>
@endsection
