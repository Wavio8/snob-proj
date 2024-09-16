{{--@if (($gallery ?? '') || ($banner ?? ''))--}}
{{--    <section class="block-banner-info {{ $offBackground ?? '' ? '' : 'bg-second' }}">--}}
{{--        <div class="in-block adaptiv-width row-2-3 block-banner-info__row">--}}
{{--            @if ($banner ?? '')--}}
{{--                <div class="col text-block">--}}
{{--                    <h2>{!! $banner->title !!}<span class="text-logo"></span></h2>--}}
{{--                    {!! $banner->text !!}--}}
{{--                    <div class="buttons">--}}
{{--                        <a class="btn" href="{{ route('vacancies') }}">Вакансии</a>--}}
{{--                        <a class="btn btn-outline" href="{{ route('culture') }}">Жизнь в СМТ</a>--}}
{{--                    </div>--}}
{{--                    @if (!($offAboutLink ?? ''))--}}
{{--                        <span class="see-more">Узнать о нас больше вы можете в разделе:--}}
{{--                            <a class="highlight" href="{{ route('about') }}"><b>О компании</b></a>--}}
{{--                        </span>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            @if (!$gallery->images()->isEmpty())--}}
{{--                <div class="col">--}}
{{--                    <div class="collage-gallery">--}}
{{--                        @foreach ($gallery->images() as $key => $image)--}}
{{--                            @if (!$key)--}}
{{--                                <div class="big-col">--}}
{{--                                    <div class="row">--}}
{{--                                        <img src="{{ asset('storage/' . $image->path) }}" alt="" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @continue--}}
{{--                            @endif--}}
{{--                            @if ($key === 1 || ($key + 1) % 2 === 0)--}}
{{--                                <div class="col">--}}
{{--                            @endif--}}
{{--                            <div class="row">--}}
{{--                                <img src="{{ asset('storage/' . $image->path) }}" alt="" />--}}
{{--                            </div>--}}
{{--                            @if ($key === 2 || (($key + 2) % 2 === 0 && $key) || count($gallery->images()) === $key + 1)--}}
{{--                    </div>--}}
{{--            @endif--}}
{{--@endforeach--}}
{{--</div>--}}
{{--</div>--}}
{{--@endif--}}
{{--</div>--}}
{{--</section>--}}
{{--@endif--}}
