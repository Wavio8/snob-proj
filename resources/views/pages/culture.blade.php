{{--@extends('layouts.default')--}}
{{--@section('content')--}}
{{--    @include('includes.utility.breadcrumbs')--}}
{{--    <section class="culture-intro">--}}
{{--        <div class="adaptiv-width">--}}
{{--            <h2 class="headline">{!! $page->title !!} </h2>--}}
{{--            <div class="text">--}}

{{--                {!! $page->text !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    @include('includes.main.gallery_block', ['gallery' => $gallery,'bgdisable' => true])--}}
{{--    @include('includes.main.await_banner', ['bgdisable' => true])--}}
{{--    <section class="culture-banner">--}}
{{--        <div class="adaptiv-width">--}}
{{--            <h2 class="headline">{!! $banner->title !!} </h2>--}}
{{--            @if ($page->images()->first())--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <img src="{{ asset('storage/' . $page->images()->first()->path) }}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        {!! $banner->text !!}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--        </div>--}}
{{--    </section>--}}
{{--    @include('includes.main.types_service', ['group' => $tiles])--}}
{{--@endsection--}}
