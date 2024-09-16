@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.h1')
    <div class="admin_edit_block">
        @include('admin.includes.back')
        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf

            @include('admin.includes.checkbox', [
                'label' => 'Скрыть',
                'name' => 'hide',
                'value' => $object->hide ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Название:',
                'name' => 'name',
                'value' => $object->name ?? '',
            ])

            @if ($object->id)
                <br>
                <br>
                <h2>Вакансии</h2>
                @include('admin.includes.add', [
                    'altPath' => 'admin.content.vacancies.edit',
                    'altParams' => ['groupID' => $object->id ?? 0],
                ])
            @endif

            @if ($items)
                <div class="sortable_list_off">
                    @foreach ($items as $item)
                        <div class="list_item">
                            <div class="list_item-info">
                                <h4>{{ $item->name }}</h4>
                            </div>

                            <div class="list_item-actions">
                                @include('admin.includes.actions.rating')
                                @if ($item->url)
                                    @include('admin.includes.actions.open', ['link' => '/' . $item->url])
                                @endif
                                @include('admin.includes.actions.edit', [
                                    'altPath' => 'admin.content.vacancies.edit',
                                    'altParams' => ['menuid' => $object->id ?? 0, 'id' => $item->id],
                                ])
                                @include('admin.includes.actions.delete', ['itemID' => $item->id])
                            </div>
                        </div>
                    @endforeach

                    @include('admin.includes.not_found')
                </div>
            @endif
            @include('admin.includes.submit')

        </form>

    </div>
@endsection
