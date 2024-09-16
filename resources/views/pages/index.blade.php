@extends('layouts.default')
@section('content')
    @include('includes.sections.section_1')
    @include('includes.sections.section_2')
    @include('includes.sections.section_3')
    @include('includes.sections.section_4')
    @include('includes.sections.section_5')
    @include('includes.sections.section_6')
    @include('includes.utility.burger')
{{--    @include('includes.main.top_banner_main')--}}
{{--    @include('includes.main.types_service', ['group' => $mainTiles])--}}
{{--    @include('includes.main.gallery_banner', ['banner' => $bestBanner, 'gallery' => $mainBannerGallery])--}}
{{--    @include('includes.content.vacancies_block')--}}
{{--    @include('includes.main.achievements')--}}
{{--    @include('includes.main.doc_banner')--}}
{{--    @include('includes.main.gallery_block', ['gallery' => $mainGallery])--}}
{{--    @include('includes.main.await_banner')--}}
@endsection
