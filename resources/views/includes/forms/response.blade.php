{{--<div class="response-form {{$modal ?? '' ? 'response-form--modal' : '' }}" id="response-form">--}}
{{--    @if ($modal ?? '')--}}
{{--        <div class="closer _closer"></div>--}}
{{--    @endif--}}
{{--    <div class="response-form__headline">{!! $title ?? '' !!} </div>--}}
{{--    <div class="response-form__grid">--}}

{{--        <form action="" class="response-form__form">--}}

{{--            @csrf--}}

{{--            <input id="VACANCY_ID_INPUT" type="hidden" value="{{ $vacancyID ?? '' }}">--}}

{{--            <div class="row-3">--}}
{{--                <div class="col">--}}
{{--                    <label for="FULLNAME_INPUT" class="beautiful-formelement">--}}
{{--                        <input id="FULLNAME_INPUT" type="text" class="beautiful-input__input input required"--}}
{{--                            required>--}}
{{--                        <span class="beautiful-input__plaholder" placeholder='ФИО'></span>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <label for="PHONE_INPUT" class="beautiful-formelement">--}}
{{--                        <input id="PHONE_INPUT" type="tel" class="beautiful-input__input input required" required>--}}
{{--                        <span class="beautiful-input__plaholder" placeholder='Телефон'></span>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <label for="EMAIL_INPUT" class="beautiful-formelement">--}}
{{--                        <input id="EMAIL_INPUT" type="email" class="beautiful-input__input input"--}}
{{--                            placeholder="E-mail">--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <label for="ABOUT_INPUT" class="beautiful-formelement js-textarea-required">--}}
{{--                    <textarea name="" id="ABOUT_INPUT" class="beautiful-input__input text-area required"></textarea>--}}
{{--                    <span class="beautiful-input__plaholder" placeholder='Расскажите о себе'></span>--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <label class="attachment-block attachment-block--mobile" for="FILE_INPUT">--}}
{{--                    <div class="attachment-btn"></div>--}}
{{--                    <div class="text">--}}
{{--                        <div class="attachment-title">Прикрепить файл</div>--}}
{{--                        <div class="attachment-description">Размер файла не должен <br> превышать 5 мб</div>--}}
{{--                    </div>--}}
{{--                </label>--}}
{{--                <button type="submit" class="btn">Отправить</button>--}}
{{--                <div class="beautiful-formelement beautiful-formelement--file">--}}
{{--                    <label class="attachment-block" for="FILE_INPUT">--}}
{{--                        <input type="file" name="" id="FILE_INPUT" class="hidden">--}}
{{--                        <div class="attachment-btn"></div>--}}
{{--                        <div class="text">--}}
{{--                            <div class="attachment-title">Прикрепить файл</div>--}}
{{--                            <div class="attachment-description">Размер файла не должен <br> превышать 5 мб</div>--}}
{{--                        </div>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                @if ($otherVacancies ?? '' ? true : false)--}}
{{--                    <a href="{{ route('vacancies') }}" class="btn btn-outline">Посмотреть другие вакансии</a>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </form>--}}
{{--        <div class="row">--}}
{{--            <span class="contact">--}}

{{--                HR-специалист:--}}
{{--                <a href="tel:{{ $setting->tel() }}">--}}
{{--                    {!! $setting->pretterPhone() !!}--}}
{{--                </a>--}}
{{--            </span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
