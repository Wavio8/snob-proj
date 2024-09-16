@extends('admin.layouts.app')
@section('content')
    <h1>Заявки</h1>
    {{-- @include('admin.includes.add') --}}
    @include('admin.includes.paginate.total')

    @if (!empty($objects))
        @if (count($objects) > 0)
            <table class="inputs-table js-inputs-table table_dark table_dark_small order-table" style="margin-top: 10px;">
                <thead>
                    <th>id</th>
                    <th>ФИО</th>
                    <th>Телефон</th>
                    <th>О себе</th>
                    <th>Почта</th>
                    <th>вакансия</th>
                    <th>файл</th>
                    {{-- <th>Прочитано</th> --}}
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($objects as $object)
                        <tr data-id="{{ $object->id }}" class="_context-target"
                            style="background: {{ $object->status_color }};">
                            <td>
                                <a title="Подробнее"
                                    href="{{ route('admin.' . $path . '.edit', ['id' => $object->id ?? 0]) }}"
                                    class="order-id">{{ $object->id }}
                                </a>
                            </td>


                            <td class="text-centet">{{ $object->name }}</td>
                            <td class="text-centet">{{ $object->phone }}</td>
                            <td>
                                {{ mb_strlen($object->about) > 40 ? mb_substr($object->about, 0, 40) . '...' : $object->about }}
                            </td>
                            <td class="text-centet">{{ $object->email ?? 'не указано' }}</td>
                            <td class="text-centet">
                                {!! $object->vacancyID
                                    ? '<a target="_blank" href="' . route('vacancy', ['id' => 1]) . '">Вакансия</a>'
                                    : 'не указано' !!}
                            </td>
                            <td class="text-centet">
                                {!! $object->file
                                    ? '<a target="_blank" href="' . asset('storage/' . $object->file) . '">Файл</a>'
                                    : 'не указано' !!}
                            </td>
                            {{-- <td></td> --}}


                            @if (!empty($fields['updated_at']))
                                <td>
                                    <div class="order-date">{{ date('d.m.Y H:i', strtotime($object->updated_at)) }}
                                </td>
                            @endif
                            <td>
                                <div class="order-edits">
                                    @include('admin.includes.actions.edit')
                                    @include('admin.includes.actions.delete', [
                                        'delete_title' => 'Удалить',
                                    ])

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="request-table">
                @include('admin.includes.not_found')
            </div>
        @endif
    @endif

    {{ $objects->links('pagination.default') }}
@endsection
