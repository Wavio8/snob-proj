@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.h1')
    <div class="admin_edit_block">
        @include('admin.includes.back', [
            'altPath' => 'admin.content.group_vacancies.edit',
            'altParams' => ['id' => $object->groupID ?? ($_GET['groupID'] ?? '')],
        ])
        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf

            @include('admin.includes.checkbox', [
                'label' => 'Скрыть',
                'name' => 'hide',
                'value' => $object->hide ?? '',
            ])

            @include('admin.includes.select', [
                'label' => 'Категория:',
                'name' => 'groupID',
                'value' => $object->groupID ?? ($_GET['groupID'] ?? ''),
                'select' => $groups,
            ])
            @include('admin.includes.input', [
                'label' => 'Название:',
                'name' => 'name',
                'value' => $object->name ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Опыт работы:',
                'name' => 'experience',
                'value' => $object->experience ?? '',
            ])
            @include('admin.includes.input', [
                'label' => 'Зарплата:',
                'name' => 'salary',
                'value' => $object->salary ?? '',
            ])
            @include('admin.includes.textbox', [
                'label' => 'Содержание',
                'name' => 'summary',
                'value' => $object->summary ?? '',
            ])


            @include('admin.includes.multiple', [
                'label' => 'Вопросы и ответы',
                'name' => 'faq',
                'value' => $faqSelected ?? '-1',
                'list' => $faq,
                'field'=>'title',
                // 'sorting_show' => true,
                'not_selected' => true,
                'all_btn_off' => true,
            ])
            @include('admin.includes.multiple', [
                'label' => 'Карточки с докторами',
                'name' => 'doctorsCards',
                'value' => $doctorsCardsSelected ?? '-1',
                'list' => $doctorsCards,
                // 'sorting_show' => true,
                'not_selected' => true,
                'all_btn_off' => true,
            ])
            @include('admin.includes.submit')

        </form>

    </div>
@endsection
