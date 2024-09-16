@if (!empty($option))

    @php
        $table = '';
        if ($option instanceof \Illuminate\Database\Eloquent\Model) {
            $table = $option->getTable();
        }
    @endphp

    @switch($table)
        @case('users')
            ID: {{ $option->id ?? '' }}
            @if (!empty($option->phone))
                | Телефон: {{ $option->phone }}
            @endif
            @if (!empty($option->email))
                | Email: {{ $option->email }}
            @endif
            @if (!empty($option->lastname) || !empty($option->name) || !empty($option->middlename))
                | ФИО: {{ $option->lastname ?? '' }} {{ $option->name ?? '' }} {{ $option->middlename ?? '' }}
            @endif
            @break
        @case('order')
            {{ $option->id ?? '' }}
            @break
        @default
            {{ $option->name ?? '' }}
    @endswitch

@endif
