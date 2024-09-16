@php
    $str = \Illuminate\Support\Str::Slug($title);
    $session = session('accordion_'.$str, '');
@endphp
<fieldset class="accordion input_block js-accordion">
    <button type="button" class="accordion__button js-accordion__button {{ $session == 1 ? 'accordion__button_active' : '' }}">{{$title}}</button>
    <div class="accordion__body js-accordion__body" style="{{ $session == 1 ? 'display: block;' : '' }}">
        {{$slot}}
    </div>
</fieldset>
