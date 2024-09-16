@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.h1')
    <div class="admin_edit_block">
        @include('admin.includes.back')
        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf


            {{-- 'image', --}}



            @include('admin.includes.input', [
                'label' => 'Город:',
                'name' => 'city',
                'value' => $object->city ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Адрес:',
                'name' => 'address',
                'value' => $object->address ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Координаты:',
                'name' => 'coordinate',
                'value' => $object->coordinate ?? '',
            ])

            @include('admin.includes.textbox', [
                'label' => 'Время работы',
                'name' => 'workTime',
                'value' => $object->workTime ?? '',
            ])



            @include('admin.includes.multiple', [
                'label' => 'Станции метро',
                'name' => 'subways',
                'value' => $subwaysSelected ?? '-1',
                'list' => $subways,
                'field' => 'name',
                // 'sorting_show' => true,
                'not_selected' => true,
                'all_btn_off' => true,
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
