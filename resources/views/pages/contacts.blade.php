{{--@extends('layouts.default')--}}
{{--@section('content')--}}
{{--    @include('includes.utility.breadcrumbs')--}}


{{--    @php--}}
{{--        $coords = [];--}}
{{--    @endphp--}}

{{--    <section class="contacts-block">--}}
{{--        <div class="adaptiv-width">--}}
{{--            <h2 class="headline">Контакты</h2>--}}
{{--            <div class="contacts-grid">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-400 address-section">--}}
{{--                        @foreach ($addresses ?? [] as $address)--}}
{{--                            <div class="address-section__city">{!! $address->city !!}</div>--}}
{{--                            <div class="address-section__address">{!! $address->address !!}</div>--}}
{{--                            @php--}}
{{--                                if ($address->coordinate) {--}}
{{--                                    $coords[] = $address->coordinate;--}}
{{--                                }--}}

{{--                                $originalArr = $address->subways();--}}

{{--                                $mainStations = $originalArr->filter(fn($item) => $item->neighbourID === null);--}}
{{--                            @endphp--}}


{{--                            @foreach ($mainStations as $station)--}}
{{--                                <div class="subway-group">--}}
{{--                                    <div class="subway-item">--}}
{{--                                        <div class="subway-item__icon">--}}
{{--                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"--}}
{{--                                                xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                <path--}}
{{--                                                    d="M11.9179 3.823L9 13.0221L6.08225 3.823C2.61132 5.01602 0 8.25233 0 11.9625C0 14.1973 0.911691 16.2581 2.38663 17.7769H6.61698L7.06047 15.8537C2.00663 13.8735 2.96223 7.73756 4.79436 6.73597C5.01183 6.80136 8.19856 17.7316 8.19856 17.7316C8.24209 17.7316 8.38352 17.7316 8.55632 17.7316C8.59282 17.7316 8.73026 17.7316 8.90153 17.7316C8.9635 17.7316 9.03041 17.7316 9.09828 17.7316C9.21462 17.7316 9.33533 17.7316 9.4433 17.7316C9.61628 17.7316 9.75752 17.7316 9.80125 17.7316C9.80125 17.7316 12.9882 6.80136 13.2054 6.73597C15.0378 7.73756 15.993 13.8735 10.9391 15.8537L11.3828 17.7769H15.6132C17.0883 16.2581 18 14.1973 18 11.9625C18 8.25233 15.3887 5.01602 11.9179 3.823Z"--}}
{{--                                                    fill="{{ $station->color ?? 'red' }}" />--}}
{{--                                            </svg>--}}
{{--                                        </div>--}}
{{--                                        <div class="subway-item__name">--}}
{{--                                            {{ $station->name }}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @if ($station->childrens())--}}
{{--                                        @foreach ($station->childrens() as $children)--}}
{{--                                            <div class="subway-item">--}}
{{--                                                <div class="subway-item__icon">--}}
{{--                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"--}}
{{--                                                        xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                        <path--}}
{{--                                                            d="M11.9179 3.823L9 13.0221L6.08225 3.823C2.61132 5.01602 0 8.25233 0 11.9625C0 14.1973 0.911691 16.2581 2.38663 17.7769H6.61698L7.06047 15.8537C2.00663 13.8735 2.96223 7.73756 4.79436 6.73597C5.01183 6.80136 8.19856 17.7316 8.19856 17.7316C8.24209 17.7316 8.38352 17.7316 8.55632 17.7316C8.59282 17.7316 8.73026 17.7316 8.90153 17.7316C8.9635 17.7316 9.03041 17.7316 9.09828 17.7316C9.21462 17.7316 9.33533 17.7316 9.4433 17.7316C9.61628 17.7316 9.75752 17.7316 9.80125 17.7316C9.80125 17.7316 12.9882 6.80136 13.2054 6.73597C15.0378 7.73756 15.993 13.8735 10.9391 15.8537L11.3828 17.7769H15.6132C17.0883 16.2581 18 14.1973 18 11.9625C18 8.25233 15.3887 5.01602 11.9179 3.823Z"--}}
{{--                                                            fill="{{ $children->color ?? 'red' }}" />--}}
{{--                                                    </svg>--}}
{{--                                                </div>--}}
{{--                                                <div class="subway-item__name">--}}
{{--                                                    {{ $children->name }}--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            @endforeach--}}

{{--                            @if ($address->workTime)--}}
{{--                                <br>--}}
{{--                                <div class="address-section__time">--}}
{{--                                    {!! $address->workTime !!}--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            <br><br>--}}
{{--                        @endforeach--}}

{{--                        <div class="address-section__hrdata">--}}
{{--                            <div class="label">--}}
{{--                                HR-специалист:--}}
{{--                            </div>--}}
{{--                            <a class="phone" href="tel:{{ $setting->tel() }}">--}}
{{--                                {!! $setting->pretterPhone() !!}--}}
{{--                            </a>--}}
{{--                            <a href="mailto:{{ $setting->email }}" class="email">{{ $setting->email }}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="contacts-block__map" id="contact-map" data-coordinates='{{ json_encode($coords) }}'>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-400 image-section">--}}

{{--                        @foreach ($addresses ?? [] as $address)--}}
{{--                            @if ($address->image)--}}
{{--                                <div class="image-item">--}}
{{--                                    <img src="{{ asset('storage/' . $address->image) }}" alt="">--}}
{{--                                    <div class="item-text-position">--}}
{{--                                        <div class="item-text">{!! $address->address !!}</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--    </section>--}}
{{--@endsection--}}
