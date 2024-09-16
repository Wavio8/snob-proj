{{--@extends('layouts.default')--}}
{{--@section('content')--}}
{{--    @include('includes.utility.breadcrumbs', ['last' => $vacancy->name])--}}

{{--    <section class="vacancy-header">--}}
{{--        <div class="adaptiv-width">--}}
{{--            <h1 class="headline">{!! $vacancy->name !!}</h1>--}}
{{--            <div class="salary">{!! $vacancy->salary !!}</div>--}}
{{--            <div class="buttons">--}}
{{--                <a href="#response-form" class="btn">Откликнуться</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="vacancy-summary">--}}
{{--        <div class="adaptiv-width">--}}
{{--            <div class="hr"></div>--}}
{{--            {!! $vacancy->summary !!}--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="vacancy-doctors bg-second">--}}
{{--        <div class="adaptiv-width">--}}
{{--            <div class="headline">--}}
{{--                <h2>--}}
{{--                    Познакомьтесь с коллективом--}}
{{--                </h2>--}}
{{--                <div class="sliders-arrows">--}}
{{--                    <div class="arrow-prev" id="_ms-prev-arrow3"></div>--}}
{{--                    <div class="arrow-next" id="_ms-next-arrow3"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <section class="splide _ms _ms-ca" data-prev="_ms-prev-arrow3" data-next="_ms-next-arrow3"--}}
{{--            data-splide='{ "arrows":false, "gap":"20px","perPage":2,"pagination":false,--}}
{{--        "breakpoints":{--}}
{{--            "1000":{},--}}
{{--            "900":{"perPage":1}--}}
{{--        }--}}
{{--    }'>--}}
{{--            <div class="splide__track">--}}
{{--                <ul class="splide__list">--}}
{{--                    @foreach ($vacancy->doctors() as $doc)--}}
{{--                        <li class="splide__slide">--}}
{{--                            <div class="doctor-card">--}}
{{--                                <div class="doctor-card__name"> {!! $doc->name !!}</div>--}}
{{--                                <div class="doctor-card__function">{!! $doc->function !!}</div>--}}
{{--                                <div class="doctor-card__text">{!! $doc->text !!}</div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </section>--}}

{{--    </section>--}}
{{--    <section class="vacancy-faq">--}}
{{--        <div class="adaptiv-width">--}}
{{--            <h2 class="headliner">--}}
{{--                Часто задаваемые вопросы--}}
{{--            </h2>--}}
{{--            @foreach ($vacancy->faq() as $item)--}}
{{--                <div class="vacancy-faq__item faq-item _accordion">--}}
{{--                    <div class="faq-item__header _accordion__head">{!! $item->title !!}</div>--}}
{{--                    <div class="faq-item__body _accordion__body">{!! $item->text !!}</div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <section class="vacancy-form">--}}
{{--        <div class="adaptiv-width">--}}
{{--            @include('includes.forms.response', [--}}
{{--                'title' => 'Отклик на вакансию',--}}
{{--                'otherVacancies' => true,--}}
{{--                'vacancyID' => $vacancy->id,--}}
{{--            ])--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
