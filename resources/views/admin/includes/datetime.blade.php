<div class="column-items column-items2 column-items-datetime">

    @if (!empty($object->created_at))
        <div class="column-item">
            @include('admin.includes.info', ['label' => 'Дата добавления:', 'value' => date('d.m.Y H:i', strtotime($object->created_at))])
        </div>
    @endif
    
    @if (!empty($object->updated_at))
        <div class="column-item">
            @include('admin.includes.info', ['label' => 'Дата редактирования:', 'value' => date('d.m.Y H:i', strtotime($object->updated_at))])
        </div>
    @endif

</div>
