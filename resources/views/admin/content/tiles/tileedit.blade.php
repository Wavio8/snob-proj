@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.h1')
    <div class="admin_edit_block">
        @include('admin.includes.back', [
            'altPath' => 'admin.content.tiles.edit',
            'altParams' => ['id' => $object->groupID ?? ($_GET['groupID'] ?? '')],
        ])
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
            @include('admin.includes.textbox', [
                'label' => 'Текст',
                'name' => 'text',
                'value' => $object->text ?? '',
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
