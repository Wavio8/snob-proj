{{--@extends('layouts.default')--}}
{{--@section('content')--}}
{{--    @include('includes.utility.breadcrumbs')--}}

{{--    <section class="education-block">--}}
{{--        <div class="adaptiv-width">--}}
{{--            <h2 class="headline">Обучение</h2>--}}
{{--            <div class="row-2">--}}
{{--                <div class="col text">--}}
{{--                    {!! $page->text !!}--}}
{{--                    <br>--}}
{{--                    <br>--}}
{{--                    <div class="row-2 buttons">--}}
{{--                        <div class="col">--}}
{{--                            <div class="btn">На сайт университета</div>--}}
{{--                        </div>--}}
{{--                        <div class="col">--}}
{{--                            <img src="/images/design/med.svg" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}

{{--                    @if ($page->images())--}}
{{--                        <div class="education-gallery">--}}
{{--                            <div class="row">--}}
{{--                                @foreach ($page->images() as $key => $item)--}}
{{--                                    @if ($key < 2)--}}
{{--                                        <div class="col">--}}
{{--                                            <img src="{{ asset('storage/' . $item->path) }}" alt="">--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                @foreach ($page->images() as $key => $item)--}}
{{--                                    @if ($key === 2)--}}
{{--                                        <div class="col">--}}
{{--                                            <img src="{{ asset('storage/' . $item->path) }}" alt="">--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    @include('includes.main.await_banner', ['bgdisable' => true])--}}
{{--@endsection--}}
