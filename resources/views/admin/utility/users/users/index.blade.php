@extends('admin.layouts.app')
@section('content')

    <h1>{{ $title[0] }}</h1>

    @include('admin.includes.search', ['search_label' => 'Введите Email, Телефон или ФИО', 'get' => '?type='.$type])
    <input type="hidden" form="filter_form" name="type" value="{{ $type }}">

    @if (\App\Helpers\Admin\Helper::checkRights(\Request::url(), 'edit'))
        <div class="filter">
            <a href="{{route('admin.'.$path.'.edit').($type == 'clients' ? '?type=clients' : '') }}" class="admin_add">Добавление {{ $title[1] ?? '' }}</a>
        </div>
    @endif

    @include('admin.includes.paginate.total')

    @if ($objects)
        <div class="sortable_list_off">
            @foreach($objects as $object)
                <div class="list_item">
                    <div class="list_item-info">
                        @if (!empty($object->email))
                            <h4>{{ $object->email }}</h4>
                        @endif
                        <h4 class="list-second">{{ $object->phone }}</h4>
                        @if (empty($type))
                            <i>{{ $object->class_name ?? '' }}</i>
                        @endif

                        @if (!empty($object->client_card_info))
                            <span class="list-item-small">Карта: {!! \App\Helpers\Admin\Helper::card_format($object->client_card_info->name) !!}</span>
                        @endif

                        @if (!empty($object->client_type_info))
                            <span class="list-item-small">Тип клиента: {!! $object->client_type_info->name !!}</span>
                        @endif

                        <i>ID: {{ $object->id ?? '' }}</i>

                    </div>
                    <div class="list_item-actions">
                        <a href="{{ route('admin.'.$path.'.edit' , ['id' => $object->id ?? 0]).(isset($_GET['type']) && $_GET['type'] == 'clients' ? '?type=clients' : '') }}" class="admin_edit" title="Редактировать"></a>
                        @if (!$object->sudo)
                            @include('admin.includes.actions.delete')
                        @endif
                    </div>
                </div>
            @endforeach

            @include('admin.includes.not_found')
        </div>
        {{ $objects->links('pagination.default') }}
    @endif

@endsection
