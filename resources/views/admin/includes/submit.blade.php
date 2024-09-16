@php
    $routeWhiteList = ['question_edit', 'answer_edit', 'result_edit'];

    $routeWhiteList = '/' . implode('|', $routeWhiteList) . '/i';
    $accessByWhiteList = preg_match($routeWhiteList, $_SERVER['REQUEST_URI']);
@endphp

@if (\App\Helpers\Admin\Helper::checkRights(\Request::url(), 'edit') || $accessByWhiteList)
    <div class="input_block">
        <button type="submit" name="save">
            @if ($label ?? '')
                {!! $label !!}
            @else
                Сохранить
            @endif
        </button>
    </div>
@endif
