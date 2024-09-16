@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.h1')
    <div class="admin_edit_block">
        @include('admin.includes.back')
        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf
            @include('admin.includes.select', [
                'label' => 'Тип:',
                'name' => 'type',
                'value' => $object->type ?? '',
                'select' => $types,
                'view' => 'admin.includes.select_views.enum',
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
                'label' => 'Текст',
                'name' => 'text',
                'value' => $object->text ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Подпись:',
                'name' => 'qute',
                'value' => $object->qute ?? '',
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
