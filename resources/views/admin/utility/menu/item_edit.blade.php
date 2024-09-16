@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.h1')
    <div class="admin_edit_block">
        @include('admin.includes.back', [
            'altPath' => 'admin.menu.edit',
            'altParams' => ['id' => $menuID],
        ])
        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf

            @include('admin.includes.checkbox', [
                'label' => 'Скрыть',
                'name' => 'hide',
                'value' => $object->hide ?? '',
            ])
            @include('admin.includes.select', [
                'label' => 'Страница:',
                'name' => 'page',
                'value' => $object->pageID ?? '',
                'select' => $pages,
                'view' => 'admin.includes.select_views.pages',
            ])
            @include('admin.includes.input', [
                'label' => 'Название:',
                'name' => 'name',
                'value' => $object->name ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Ссылка:',
                'name' => 'url',
                'value' => $object->url ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Рейтинг:',
                'name' => 'rating',
                'value' => $object->rating ?? '',
            ])


            @include('admin.includes.submit')

        </form>

    </div>
@endsection
