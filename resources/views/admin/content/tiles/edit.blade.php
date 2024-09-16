@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.h1')
    <div class="admin_edit_block">
        @include('admin.includes.back')
        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf
            @include('admin.includes.input', [
                'label' => 'Название:',
                'name' => 'name',
                'value' => $object->name ?? '',
            ])

            @include('admin.includes.input', [
                'label' => 'Заголовок:',
                'name' => 'title',
                'value' => $object->title ?? '',
            ])
            @include('admin.includes.select', [
                'label' => 'Страница:',
                'name' => 'page',
                'value' => $object->pageID ?? '',
                'select' => $pages,
                'view' => 'admin.includes.select_views.pages',
            ])



            @if ($object->id)
                <br>
                <br>
                <h2>Плитки</h2>
                @include('admin.includes.add', [
                    'altPath' => 'admin.content.tileedit.edit',
                    'altParams' => ['groupID' => $object->id ?? 0],
                ])
            @endif


            @if (!$items->isEmpty())
                <div class="sortable_list_off">
                    @foreach ($items as $item)
                        <div class="list_item">
                            <div class="list_item-info">
                                <h4>{{ $item->name == '' ? (mb_strlen($item->text) > 40 ? mb_substr($item->text, 0, 40) . '...' : $item->text) : $item->name }}
                                </h4>
                            </div>

                            <div class="list_item-actions">
                                {{-- @include('admin.includes.actions.rating') --}}
                                @include('admin.includes.actions.edit', [
                                    'altPath' => 'admin.content.tileedit.edit',
                                    'altParams' => ['groupID' => $object->id ?? 0, 'id' => $item->id],
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
