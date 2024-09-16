@extends('admin.layouts.app')
@section('content')
        <h1>{{$title[0]}}</h1>

        @include('admin.includes.search')
        @include('admin.includes.add')

        @if ($objects)

            <div>
            @foreach($objects as $object)
                <div class="list_item">
                    <div class="list_item-info">
                        <h4>{{$object->name}}</h4>
                    </div>
                    <div class="list_item-actions">
                        @include('admin.includes.actions.edit')
                        @include('admin.includes.actions.delete')
                    </div>
                </div>
            @endforeach
            </div>

        @endif

@endsection
