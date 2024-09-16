@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.h1')
    <div class="admin_edit_block">
        @include('admin.includes.back')
        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf

            @include('admin.includes.input', [
                'label' => 'Имя:',
                'name' => 'name',
                'value' => $object->name ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Должность:',
                'name' => 'position',
                'value' => $object->position ?? '',
            ])
               @include('admin.includes.images.image', [
                'title' => 'Фото:',
                'name' => 'image',
                'object' => $object,
                'path' => '/storage/' . $object->image,
            ])
            @include('admin.includes.submit')

        </form>

    </div>
@endsection
