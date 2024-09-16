
{{--@if ($paginator->hasPages())--}}
{{--    <div class="catalog__pages">--}}
{{--        @if (!$paginator->onFirstPage())--}}
{{--        <a href="{{$paginator->previousPageUrl()}}" class="catalog__arrow catalog__prev"><img--}}
{{--                src="/public/images/icons/arrow.png" alt=""></a>--}}
{{--        @endif--}}
{{--        <input class="catalog__number-of-page" type="number" form="filter-form" value="{{$paginator->currentPage()}}" data-page="{{$paginator->currentPage()}}">--}}
{{--        @if (!$paginator->onLastPage())--}}
{{--        <a href="{{$paginator->nextPageUrl()}}" class=" catalog__arrow catalog__next"><img--}}
{{--                src="/public/images/icons/arrow.png" alt=""></a>--}}
{{--        @endif--}}
{{--        <div class="catalog__number-of-pages"><span>{{__('из')}}</span> <span--}}
{{--                class="catalog__number-of-pages_max">{{$paginator->lastPage()}}</span></div>--}}
{{--    </div>--}}
{{--@endif--}}
