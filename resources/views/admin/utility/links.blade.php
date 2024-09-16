<x-Admin.NavBar title="Пользователи" url="users" all="{{ isset($all) && $all }}">
    @include('admin.includes.menu.item', ['route' => 'admin.users.users.index', 'name' => 'Пользователи'])
    @include('admin.includes.menu.item', [
        'route' => 'admin.users.classes.index',
        'name' => 'Классы пользователей',
    ])
</x-Admin.NavBar>
<x-Admin.NavBar title="Контент" url="content" all="{{ isset($all) && $all }}">
    @include('admin.includes.menu.item', [
        'route' => 'admin.content.group_vacancies.index',
        'name' => 'Вакансии',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.content.banners.index',
        'name' => 'Баннеры',
    ])
    @include('admin.includes.menu.item', [
        'route' => 'admin.content.title.index',
        'name' => 'Заголовки',
    ])
    @include('admin.includes.menu.item', [
        'route' => 'admin.content.services.index',
        'name' => 'Услуги',
    ])
    @include('admin.includes.menu.item', [
        'route' => 'admin.content.team.index',
        'name' => 'Слайдер команды',
    ])
    @include('admin.includes.menu.item', [
        'route' => 'admin.content.cases.index',
        'name' => 'Слайдер кейсы',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.content.achievements.index',
        'name' => 'Достижения',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.content.doctors_card.index',
        'name' => 'Карточки докторов',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.content.faq.index',
        'name' => 'Вопросы и ответы',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.content.tiles.index',
        'name' => 'Плитки',
    ])

    @include('admin.includes.menu.item', [
        'route' => 'admin.content.gallery.index',
        'name' => 'Галереи',
    ])
    @include('admin.includes.menu.item', [
        'route' => 'admin.content.subway.index',
        'name' => 'Метрополитены',
    ])
</x-Admin.NavBar>


{{-- @include('admin.includes.menu.item', [
    'route' => 'admin.seo.seo_optimization.index',
    'name' => 'Оптимизация',
]) --}}
@include('admin.includes.menu.item', ['route' => 'admin.forms.requests.index', 'name' => 'Заявки'])
@include('admin.includes.menu.item', ['route' => 'admin.menu.index', 'name' => 'Меню'])
@include('admin.includes.menu.item', ['route' => 'admin.page.index', 'name' => 'Страницы'])
@include('admin.includes.menu.item', ['route' => 'admin.content.addresses.index', 'name' => 'Адреса'])
@include('admin.includes.menu.item', ['route' => 'admin.settings.index', 'name' => 'Настройки'])
