@extends('admin.layouts.app')
@section('content')

        @include('admin.includes.h1')

        <div class="admin_edit_block">

            <div class="admin_edit-links">
                <a href="{{route('admin.users.users.index').($type == 'clients' ? '?type=clients' : '')}}">Назад к списку</a>
            </div>


            <form  method="post" class="admin_edit-form" enctype="multipart/form-data">

                @csrf

                @php
                    $type_user = !empty($type) ? '' : 'admin-box-hide';
                    $type_client = !empty($type) ? 'admin-box-hide' : '';
                @endphp

                <div class="{{ $type_user }}">
                    @include('admin.includes.info', ['label' => 'Дата подтверждения телефона:', 'value' => !empty($object->phone_verified_at) ? date('d.m.Y H:i', strtotime($object->phone_verified_at)) : 'пока не подтверждён'])
                    @include('admin.includes.info', ['label' => 'Дата подтверждения почты:', 'value' => !empty($object->email_verified_at) ? date('d.m.Y H:i', strtotime($object->email_verified_at)) : 'пока не подтверждён'])
                </div>

                <fieldset class="{{ $type_client }}">
                    <legend>Класс и тип пользователя</legend>
                    @include('admin.includes.select', ['label'=>'Класс пользователя:', 'name'=>'class', 'value'=>$object->class ?? 3, 'select'=>$select_user_class])
                </fieldset>

                <fieldset>
                    <legend>Основные данные</legend>
                    <div class="column-items column-items2">
                        <div class="column-item">
                            @include('admin.includes.input', ['label' => 'Email:', 'name' => 'email', 'value' => $object->email ?? '', 'required' => 'required'])
                            @if (session('message_email'))
                                <div class="error">{!! session('message_email') !!}</div>
                            @endif
                        </div>
                        <div class="column-item {{ $type_client }}">
                            <div class="input_block">
                                <span>{{ !empty($object->id) ? 'Новый пароль' : 'Пароль' }}:</span>
                                <input type="password" name="password" value="" autocomplete="new-password">
                            </div>
                        </div>
                    </div>

                    <div class="input_block {{ $type_user }}">
                        <span>Телефон:</span>
                        <div class="input_block_row">
                            <select class="select-phone-code" name="phone_code">
                                @foreach ($select_phone_code AS $code)
                                    <option value="{{ $code->name }}" {{ $code->name == ($object->phone_code ?? '') ? 'selected' : '' }}>{{ $code->name }}</option>
                                @endforeach
                            </select>
                            <input class="select-phone" type="text" name="phone" value="{{ $object->phone ?? '' }}" maxlength="191">
                        </div>
                    </div>
                    @if (session('message_phone'))
                        <div class="error">{!! session('message_phone') !!}</div>
                    @endif

                </fieldset>

                <div class="{{ $type_user }}">
                    <fieldset>
                        <legend>Профиль</legend>

                        {{-- {!! \App\Helpers\GenerateForm::makeImage('Аватар', 'image' , $object , '/storage/'.$object->image) !!} --}}

                        <div class="column-items column-items3 column-items-margin">
                            <div class="column-item">
                                @include('admin.includes.input', ['label' => 'Фамилия:', 'name' => 'lastname', 'value' => $object->lastname ?? ''])
                            </div>
                            <div class="column-item">
                                @include('admin.includes.input', ['label' => 'Имя:', 'name' => 'name', 'value' => $object->name ?? ''])
                            </div>
                            <div class="column-item">
                                @include('admin.includes.input', ['label' => 'Отчество:', 'name' => 'middlename', 'value' => $object->middlename ?? ''])
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Бонусы</legend>
                        <div class="bonus-accrual js-bonus-accrual input_block">
                            <div class="bonus-accrual__grid js-bonus-accrual__grid" style="margin-bottom: 10px;">
                                <input type="text" class="js-bonus-accrual__input" placeholder="Начислить бонусов" style="max-width: 50%">
                                <span>до</span>
                                <input type="date" class="js-bonus-accrual__input-date" placeholder="Дата" style="max-width: 30%">
                                <button type="button" class="js-bonus-accrual__button" data-id="{{$object->id}}" data-type="custom_accrual">Начислить</button>
                            </div>
                            <strong>У данного пользователя всего <span>{{$object->bonuses_count}}</span> бонусов</strong>
                            @foreach ($burn_bonuses as $burn_bonus)
                                <p> {{$burn_bonus->count}} бонусов до {{date('d.m.Y', $burn_bonus->retrieve_date)}} </p>
                            @endforeach
                        </div>

                        @if (!empty($bonuses_history_accrual))
                            @if (count($bonuses_history_accrual) > 0)
                                <div class="table-scroll-head">История начисления бонусов:</div>
                                <div class="table-scroll">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Дата</th>
                                                <th>Сумма</th>
                                                <th>Тип</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bonuses_history_accrual AS $history)
                                                <tr>
                                                    <td>{{ date('d.m.Y H:i', strtotime($history->created_at)) }}</td>
                                                    <td>+ {{ $history->count }}</td>
                                                    <td>{{ $bonuses_history_types[$history->type] ?? '' }}</td>
                                                    <td><a href='{{ App\Models\Discounts\Bonuses\BonusesHistory::types_url($history) }}' target='_blank'>Ссылка на тип</a></td>
                                                </tr>
                                             @endforeach
                                        </tbody>
                                    </table>
                                </div>
                             @endif
                        @endif

                        @if (!empty($bonuses_history_retrieve))
                            @if (count($bonuses_history_retrieve) > 0)
                                <div class="table-scroll-head">История списания бонусов:</div>
                                <div class="table-scroll">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Дата</th>
                                                <th>Сумма</th>
                                                <th>Тип</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bonuses_history_retrieve AS $history)
                                                <tr>
                                                    <td>{{ date('d.m.Y H:i', strtotime($history->created_at)) }}</td>
                                                    <td>- {{ $history->count }}</td>
                                                    <td>{{ $bonuses_history_types[$history->type] ?? '' }}</td>
                                                    <td><a href='{{ App\Models\Discounts\Bonuses\BonusesHistory::types_url($history) }}' target='_blank'>Ссылка на тип</a></td>
                                                </tr>
                                             @endforeach
                                        </tbody>
                                    </table>
                                </div>
                             @endif
                        @endif

                    </fieldset>

                    <fieldset>
                        <legend>Карта и тип клиента</legend>

                        @include('admin.includes.select', ['label'=>'Карта клиента:', 'name'=>'client_card', 'value'=>$object->client_card ?? 3, 'select'=>$select_client_card])

                        @include('admin.includes.select', ['label'=>'Тип клиента:', 'name'=>'client_type', 'value'=>$object->client_type ?? 3, 'select'=>$select_client_type])

                        @php
                            $client_type_history = App\Models\Profile\ClientTypeHistory::list($object->id ?? 0);
                        @endphp
                        @if (!empty($client_type_history))
                            @if (count($client_type_history) > 0)
                                <div class="table-scroll-head">История изменения типа клиента:</div>
                                <div class="table-scroll">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Дата</th>
                                                <th>Старый тип клиента</th>
                                                <th></th>
                                                <th>Новый тип клиента</th>
                                                <th>Кто менял?</th>
                                                <th>Количество заказов</th>
                                                <th>Сумма заказов</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($client_type_history AS $history)
                                                <tr>
                                                    <td>{{ date('d.m.Y H:i', strtotime($history->created_at)) }}</td>
                                                    <td>{{ $history->client_type_old_name }}</td>
                                                    <td>=></td>
                                                    <td>{{ $history->client_type_name }}</td>
                                                    <td>{!! $history->user_info !!}</td>
                                                    <td>{{ $history->auto_order_count }}</td>
                                                    <td>{{ $history->auto_order_sum }}</td>
                                                </tr>
                                             @endforeach
                                        </tbody>
                                    </table>
                                </div>
                             @endif
                        @endif

                    </fieldset>

                    <fieldset>
                        <legend>Дополнительная информация</legend>

                        @php
                        if (!empty($wishlist_link)) $wishlist_link = "<a href='{$wishlist_link}' target='_blank'>{$wishlist_link}</a>";
                        @endphp
                        @include('admin.includes.info', ['label' => 'Вишлист пользователя:', 'value' => $wishlist_link ])

                        @include('admin.includes.info', ['label' => 'День рождения:', 'value' => !empty($object->birthday) ? date('d.m.Y', strtotime($object->birthday)) : 'неизвестно' ])
                        @if (!empty($object->ulogin_vkontakte))
                            @include('admin.includes.info', ['label' => 'Ссылка на VK:', 'value' => $object->ulogin_vkontakte ])
                        @endif
                        @if (!empty($object->ulogin_google))
                            @include('admin.includes.info', ['label' => 'Ссылка на Google:', 'value' => $object->ulogin_google ])
                        @endif
                        @if (!empty($object->ulogin_yandex))
                            @include('admin.includes.info', ['label' => 'Ссылка на Yandex:', 'value' => $object->ulogin_yandex ])
                        @endif
                    </fieldset>

                </div>

                @include('admin.includes.submit')

            </form>

        </div>

@endsection
