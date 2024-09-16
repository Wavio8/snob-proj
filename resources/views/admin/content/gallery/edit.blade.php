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

            @include('admin.includes.images.gallery', [
                'title' => 'Галлерея',
                'name' => 'gallery',
                'path' => '',
                'images' => $object->images(),
            ])

            @include('admin.includes.submit')

        </form>

    </div>
@endsection
