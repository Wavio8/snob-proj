{{--@if ($achivments)--}}
{{--    <section class="achievements bg-second">--}}
{{--        <div class="adaptiv-width">--}}
{{--            <div class="headline">--}}
{{--                <h2>Достижения клиники</h2>--}}
{{--                <div class="sliders-arrows">--}}
{{--                    <div class="arrow-prev" id="_ms-prev-arrow"></div>--}}
{{--                    <div class="arrow-next" id="_ms-next-arrow"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <section class="splide _ms _ms-ca" data-prev="_ms-prev-arrow" data-next="_ms-next-arrow"--}}
{{--            data-splide='{"trimSpace":false,"drag":"free","focus":".35", "pagination":false, "arrows":false, "gap":"30px","perPage":6,--}}
{{--            "breakpoints":{--}}
{{--                "1000":{"perPage":4,"focus":"center","drag":"true","trimSpace":"move", "gap":"20px","type":"loop"},--}}
{{--                "700":{"perPage":3,"focus":"center","drag":"true","trimSpace":"move", "gap":"20px","type":"loop"},--}}
{{--                "500":{"perPage":1,"focus":"center","drag":"true","trimSpace":"move", "gap":"20px","type":"loop"}--}}
{{--            }--}}
{{--        }'>--}}
{{--            <div class="splide__track">--}}
{{--                <ul class="splide__list">--}}
{{--                    @foreach ($achivments as $item)--}}
{{--                        <li class="splide__slide">--}}
{{--                            <div class="achievements__sertificate">--}}

{{--                                <a href="{{ $item->image ? asset('storage/' . $item->image) : '/images/content/sertificate.png' }}"--}}
{{--                                    data-lightbox="image-1">--}}
{{--                                    <img data-lightbox="test"--}}
{{--                                        src={{ $item->image ? asset('storage/' . $item->image) : '/images/content/sertificate.png' }}--}}
{{--                                        alt="" />--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    </section>--}}
{{--@endif--}}
