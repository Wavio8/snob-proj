@extends('admin.layouts.app')
@section('content')
    <h1>Настройки</h1>
    <div class='admin_edit_block'>

        <form method="post" class="admin_edit-form" enctype="multipart/form-data">
            @csrf
            @include('admin.includes.input', [
                'label' => 'Email для отображения на сайте:',
                'name' => 'email',
                'value' => $object->email ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Телефон для отображения на сайте:',
                'name' => 'phone',
                'value' => $object->phone ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Второй телефон для отображения на сайте:',
                'name' => 'phone2',
                'value' => $object->phone2 ?? '',
            ])
            @include('admin.includes.submit')
        </form>
    </div>
@endsection
