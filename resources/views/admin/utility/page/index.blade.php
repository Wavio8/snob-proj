@extends('admin.layouts.app')
@section('content')
        <h1>{{$TITLE[0]}}</h1>

        @include('admin.includes.search')

        @include('admin.includes.add', ['path' => 'page'])

        @if ($objects)

            <div class="sortable_list_off">
                @foreach($objects as $object)
                    <div class="list_item">
                        <div class="list_item-info">
                            <h4>{{ $object->name }}</h4>
                            <i><a class="admin-link" href="{{ $object->url ? '/'.$object->url : '' }}" target="_blank">{{ $object->url }}</a></i>
                        </div>
                        <div class="list_item-actions">
                            @include('admin.includes.actions.open', ['link' => url('/'.$object->url)])
                            @include('admin.includes.actions.show')
                            @include('admin.includes.actions.rating')
                            @include('admin.includes.actions.edit', ['path' => 'page'])
                            @if ($object->id > 16 && empty($object->page_code))
                                @include('admin.includes.actions.delete')
                            @endif
                        </div>
                    </div>
                @endforeach
                @include('admin.includes.not_found')
            </div>

        @endif

@endsection
