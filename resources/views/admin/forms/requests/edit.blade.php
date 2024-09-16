@extends('admin.layouts.app')
@section('content')
    {{-- @include('admin.includes.h1') --}}
    <div class="admin_edit_block">
        @include('admin.includes.back')

        <h2>ФИО: {{ $object->name }}</h2><br>
        <h2>Телефон: {{ $object->phone }}</h2><br>
        <h2>Почта: {{ $object->email ?? 'не указано' }}</h2><br>
        <h2>О себе:</h2><br>
        <p>{{ $object->about }}</з>

            <br><br>
        <h2>Вакансия: {!! $object->vacancyID
            ? '<a target="_blank" href="' . route('vacancy', ['id' => 1]) . '">Вакансия</a>'
            : 'не указано' !!}</h2><br>
        <h2>Файл: {!! $object->file
            ? '<a target="_blank" href="' . asset('storage/' . $object->file) . '">Файл</a>'
            : 'не указано' !!}</h2><br>
        <h2>Дата отправки: {{ date('d.m.Y H:i', strtotime($object->updated_at)) }}</h2><br>

    </div>
@endsection
