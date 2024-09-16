@extends('admin.layouts.app')
@section('content')
    {{-- @include('admin.includes.h1') --}}
    <h1>{{ $object->name }}</h1>
    <div class="admin_edit_block">
        @include('admin.includes.back')
        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf
            @include('admin.includes.input', [
                'label' => 'Название:',
                'name' => 'name',
                'value' => $object->name ?? '',
            ])
            <br>
            <label for="">Цвет</label>
            <input type="color" name="color" id="" value="{{ $object->color ?? '' }}">
            <br><br>
            @if ($object->childrens()->isEmpty())
                @include('admin.includes.select', [
                    'label' => 'Соседняя станция:',
                    'name' => 'type',
                    'value' => $object->neighbourID ?? '',
                    'select' => $subways,
                ])
            @else
                я вляется родительской для<br><br>
                @foreach ($object->childrens() as $item)
                    <a href="{{ route('admin.' . $path . '.edit', ['id' => $item->id]) }}"
                        {!! $item->color ? 'style="color:' . $item->color . '"' : '' !!}>{{ $item->name }}</a>
                    <br>
                @endforeach
            @endif

            @include('admin.includes.submit')

        </form>

    </div>
@endsection
