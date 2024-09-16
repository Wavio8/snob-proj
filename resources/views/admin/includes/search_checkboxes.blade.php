<div class="input_block {{$class}}" @if (isset($display) && $display) style="display: {{$display}};" @endif>

    @php
        if (empty($allOption)) $allOption = '';
        if (empty($id)) $id = $object->id ?? 0;
    @endphp

    <span>{{$title ?? ''}}</span>
    <button type="button" class="button js-modal-search-checkboxes" data-name={{ $name }} data-url="{{$url}}" data-class="{{$class}}" data-id="{{$id ?? ''}}" data-all-option="{{ json_encode($allOption)}}">
        Редактировать
    </button>
    <input type="hidden" name="{{$name}}" value="{{$value ?? ''}}">
    @if (isset($model) && $value)
        @php $ids = explode('|', $value); @endphp
        @include('admin.includes.sortable.info')
        <div class="sortable_list">
            @foreach ($ids as $ids_item)
                @php $obj = $model::find($ids_item); @endphp
                <div class="list_item">
                    <div class="list_item-info">
                        <p>{{ $object->name ?? $object->title }}</p>
                    </div>
                    <div class="list_item-actions">
                        @if (!empty($obj))
                            <input type='text' class='rating-change' value="{{ $obj->rating ?? 0 }}"
                                   data-id="{{ $obj->id ?? 0 }}"
                                   data-class="{{ $middle_model }}" placeholder='Рейтинг'>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
