<h1>
    @if (!empty($object->id))
        Редактирование
    @else
        Добавление
    @endif

    @if (!empty($title[1]))
        {{ $title[1] }}
    @elseif (!empty($TITLE[1]))
        {{ $TITLE[1] }}
    @endif
</h1>
