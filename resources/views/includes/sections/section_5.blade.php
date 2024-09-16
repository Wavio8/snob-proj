<div class="section-customer section-case" id="s6">
    <div class="customer__title case__title">
        {!!  $title[4]->title ?? "" !!}
    </div>



    <section id="slider3" class="splide" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                @if (!$gallery->images()->isEmpty())
                    <div class="col">
                        <div class="collage-gallery">
                            @foreach ($gallery->images() as $key => $image)
                                @if (!$key)
                                    <li class="splide__slide">
                                        <div class="card__logo">
                                            <img class="card__logo-img" src="{{ asset('storage/' . $image->path) }}" alt="">
                                        </div>
                                    </li>
                                    @continue
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
{{--                <li class="splide__slide">--}}
{{--                    <div class="card__logo">--}}
{{--                        <img class="card__logo-img" src="/images/Turbomilk-logo1.svg" alt="">--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="splide__slide">--}}
{{--                    <div class="card__logo">--}}
{{--                        <img class="card__logo-img" src="/images/pinterest.svg" alt="">--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="splide__slide">--}}
{{--                    <div class="card__logo">--}}
{{--                        <img class="card__logo-img" src="/images/quora_sl.svg" alt="">--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="splide__slide">--}}
{{--                    <div class="card__logo">--}}
{{--                        <img class="card__logo-img" src="/images/yandex.svg" alt="">--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="splide__slide">--}}
{{--                    <div class="card__logo">--}}
{{--                        <img class="card__logo-img" src="/images/1c.svg" alt="">--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="splide__slide">--}}
{{--                    <div class="card__logo">--}}
{{--                        <img class="card__logo-img" src="/images/lukoil.svg" alt="">--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="splide__slide">--}}
{{--                    <div class="card__logo">--}}
{{--                        <img class="card__logo-img" src="/images/playrix.svg" alt="">--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="splide__slide">--}}
{{--                    <div class="card__logo">--}}
{{--                        <img class="card__logo-img" src="/images/playrix.svg" alt="">--}}
{{--                    </div>--}}
{{--                </li>--}}
            </ul>
        </div>
    </section>
    <section id="slider4" class="splide" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <div class="card__logo">
                        <img class="card__logo-img" src="/images/tidal.svg" alt="">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="card__logo">
                        <img class="card__logo-img" src="/images/tumblr.svg" alt="">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="card__logo">
                        <img class="card__logo-img" src="/images/square.svg" alt="">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="card__logo">
                        <img class="card__logo-img" src="/images/openAi.svg" alt="">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="card__logo">
                        <img class="card__logo-img" src="/images/moz.svg" alt="">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="card__logo">
                        <img class="card__logo-img" src="/images/mixpanel.svg" alt="">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="card__logo">
                        <img class="card__logo-img" src="/images/mega.svg" alt="">
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="card__logo">
                        <img class="card__logo-img" src="/images/playrix.svg" alt="">
                    </div>
                </li>
            </ul>
        </div>
    </section>
</div>
