<div class="filter">
    <h2 class="filter-h2">
        Фильтр
        @if (url()->full() <> url()->current())
            <a class="filter-reset" href="{{ url()->current() }}{{ $get ?? '' }}">Сбросить</a>
        @endif
    </h2>
    <form  method="get" class="filter_form" id="filter_form">

        <div class="filter-left">

            <div class="filter-left-search">
                <span>Поиск:</span>
                <input type="text" name="search" placeholder="{{ $search_label ?? 'Введите название' }}" value="{{ $_GET['search'] ?? '' }}">
                <button type="submit" class="blue_btn">Поиск</button>
            </div>

            <div class="filter-left-selects">

                @if (!empty($select3))
                    <div class='search-select3'>
                        <span>{!! $select_label3 ?? '&nbsp;' !!}</span>

                        <select name='select3' class='chosen'>
                            <option value='0'>Не выбрано</option>
                            @foreach ($select3 AS $option)
                                <option value='{{ $option->id ?? 0 }}' {{ ($_GET['select3'] ?? '') == $option->id ? 'selected' : '' }}>
                                    @include('admin.includes.option.item', ['option'=>$option])
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if (!empty($select4))
                    <div class='search-select4'>
                        <span>{!! $select_label4 ?? '&nbsp;' !!}</span>
                        <select name='select4' class='chosen'>
                            <option value='0'>Не выбрано</option>
                            @foreach ($select4 AS $option)
                                <option value='{{ $option->id ?? 0 }}' {{ ($_GET['select4'] ?? '') == $option->id ? 'selected' : '' }}>
                                    @include('admin.includes.option.item', ['option'=>$option])
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif

            </div>

        </div>

        <div class='search-select-wrap'>
            @if (!empty($select))
                <div class='search-select'>
                    <span>{!! $select_label ?? '&nbsp;' !!}</span>
                    <select name='select' class='chosen'>
                        <option value='0'>Не выбрано</option>
                        @foreach ($select AS $option)
                            <option value='{{ $option->id ?? 0 }}' {{ ($_GET['select'] ?? '') == $option->id ? 'selected' : '' }}>
                                @include('admin.includes.option.item', ['option'=>$option])
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (!empty($select2))
                <div class='search-select2'>
                    <span>{!! $select_label2 ?? '&nbsp;' !!}</span>
                    <select name='select2' class='chosen'>
                        <option value='0'>Не выбрано</option>
                        @foreach ($select2 AS $option)
                            <option value='{{ $option->id ?? 0 }}' {{ ($_GET['select2'] ?? '') == $option->id ? 'selected' : '' }}>
                                @include('admin.includes.option.item', ['option'=>$option])
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>

    </form>
</div>
