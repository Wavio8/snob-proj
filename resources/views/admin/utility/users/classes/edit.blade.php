@extends('admin.layouts.app')
@section('content')
    @include('admin.includes.h1')

    <div class="admin_edit_block">
        @include('admin.includes.back')

        <form method="post" enctype="multipart/form-data" class="admin_edit-form">
            @csrf

            @include('admin.includes.input', [
                'label' => 'Название:',
                'name' => 'name',
                'value' => $object->name ?? '',
                'required' => 'required',
            ])



            @foreach ($portectedRoutes as $path => $section)
                @if (count($section['routes']) > 1)
                    <fieldset class="js-fieldset">
                        <legend>{{ $section['name'] }}</legend>
                        @foreach ($section['routes'] as $route => $name)
                            @php
                                $paths = $object->rights->filter(fn($item) => $item->path === $route);
                            @endphp
                            @include('admin.includes.users.access_checkboxes', [
                                'path' => $route,
                                'name' => $name,
                                'value' => App\Helpers\Admin\Helper::multiple($paths->pluck('type')->toArray()),
                            ])
                        @endforeach
                    </fieldset>
                @else
                    @foreach ($section['routes'] as $route => $name)
                        @php
                            $paths = $object->rights->filter(fn($item) => $item->path === $route);
                        @endphp
                        @include('admin.includes.users.access_checkboxes', [
                            'path' => $route,
                            'name' => $name,
                            'value' => App\Helpers\Admin\Helper::multiple($paths->pluck('type')->toArray()),
                        ])
                    @endforeach
                @endif
            @endforeach

            @include('admin.includes.submit')
        </form>
    </div>
@endsection

@section('custom_script')
    <script>
        // $('.js-all-checkboxes').find('input[type="checkbox"]').on('change', function(){
        //    var fieldset = $(this).closest('.js-fieldset');
        //    var index = $(this).closest('.js-all-checkboxes').find('.checkbox_block').index($(this).closest('.checkbox_block')) + 1;

        //    fieldset.find('.checkbox_block:nth-child('+index+') input[type="checkbox"]').prop('checked', $(this).is(':checked')?'checked':'');
        // });
    </script>
@endsection
