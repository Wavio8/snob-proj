{{--@if ($vacanciesGroups ?? '')--}}
{{--    <section class="vacancies">--}}
{{--        <div class="adaptiv-width">--}}
{{--            <h2 class="headline">Мы приглашаем в нашу команду:</h2>--}}
{{--            <div class="vacancies-grid js-vacancies">--}}
{{--                <div class="vacancies-list">--}}

{{--                    <div class="_accordion mobile-only">--}}
{{--                        <div class="_accordion__head">--}}
{{--                            <div class="vacancies-list__item active">Все вакансии</div>--}}
{{--                        </div>--}}
{{--                        <div class="_accordion__body">--}}
{{--                            @foreach ($vacanciesGroups as $key => $group)--}}
{{--                                <div class="vacancies-list__item">{!! $group->name !!}</div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}



{{--                </div>--}}

{{--                <div class="vacancies-wrapper-hendler">--}}
{{--                    <div class="vacancies-wrapper ">--}}
{{--                        @foreach ($vacanciesGroups as $key => $group)--}}
{{--                            @foreach ($group->vacancies() as $vacancy)--}}
{{--                                @include('includes.content.vacancis_item')--}}
{{--                            @endforeach--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                    @foreach ($vacanciesGroups as $key => $group)--}}
{{--                        <div class="vacancies-wrapper {{ 'hidden' }}">--}}
{{--                            @if (!$group->vacancies()->isEmpty())--}}
{{--                                @foreach ($group->vacancies() as $vacancy)--}}
{{--                                    @include('includes.content.vacancis_item')--}}
{{--                                @endforeach--}}
{{--                            @else--}}
{{--                                <h4>--}}
{{--                                    нет вакансий--}}
{{--                                </h4>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endif--}}
