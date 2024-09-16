<div class="input_block">
   
    @include('admin.includes.multiple', [
        'label' => $name,
        'name' => $path,
        'value' => $value,
        'list' => $rightsList,
        'all_default_off' => true,
    ])
</div>
