{{--@if (($gallery ?? '') && !$gallery->images()->isEmpty())--}}
{{--    <section class="gallery-block {{ $bgdisable ?? '' ? '' : 'bg-second' }}">--}}
{{--        <div class="adaptiv-width">--}}
{{--            <div class="row-3-7">--}}
{{--                <div class="col">--}}
{{--                    <div class="let-bar">--}}
{{--                        <div class="text">--}}

{{--                            {!! $gallery->title !!}--}}

{{--                        </div>--}}
{{--                        <div class="image">--}}
{{--                            --}}{{-- <img src="/images/design/gallery1.png" alt="" /> --}}
{{--                            <img src="/images/design/gallery1.png" alt="" />--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    @php--}}

{{--                        $arr = $gallery--}}
{{--                            ->images()--}}
{{--                            ->pluck('alt')--}}
{{--                            ->toArray();--}}

{{--                        $empty = 0;--}}
{{--                        foreach ($arr as $value) {--}}
{{--                            if (!$value) {--}}
{{--                                $empty++;--}}
{{--                            }--}}
{{--                        }--}}
{{--                        if ($empty > 0) {--}}
{{--                            $arr = [];--}}
{{--                        }--}}

{{--                    @endphp--}}
{{--                    <section class="splide _ms _ms-cp _ms-ca" data-prev="_ms-prev-arrow2" data-next="_ms-next-arrow2"--}}
{{--                        @if ($arr) data-pagination='{{ json_encode($arr) }}' @endif--}}
{{--                        data-splide='{ "arrows":false, "gap":"30px","perPage":1,"height":"700px", "pagination":@if ($arr) {{ 'true' }}@else   {{ 'false' }} @endif,--}}
{{--                        "breakpoints":{--}}
{{--                            "1000":{"height":"400px"},--}}
{{--                            "400":{"height":"200px"}--}}
{{--                        }--}}
{{--                    }'>--}}
{{--                        <div class="sliders-arrows">--}}
{{--                            <div class="arrow-prev" id="_ms-prev-arrow2"></div>--}}
{{--                            <div class="arrow-next" id="_ms-next-arrow2"></div>--}}
{{--                        </div>--}}
{{--                        <div class="splide__track">--}}
{{--                            <ul class="splide__list">--}}

{{--                                @foreach ($gallery->images() as $item)--}}
{{--                                    <li class="splide__slide">--}}
{{--                                        <div class="gallery-img">--}}
{{--                                            <img src="{{ asset('storage/' . $item->path) }}"--}}
{{--                                                alt="{{ $item->alt }}" />--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </section>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endif--}}
