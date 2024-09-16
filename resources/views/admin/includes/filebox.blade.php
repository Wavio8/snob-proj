<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="file-uploader">
    @if (isset($label))
        <header class="file-uploader__header">{{$label}}</header>
    @endif
    <div class="file-uploader__form" @if (!isset($label)) style="margin-top: 0;" @endif >
        <input class="file-input" type="file" name="{{$name}}[]" hidden="" multiple>
        <i class="fas fa-cloud-upload-alt"></i>
        <p>Нажмите, чтобы загрузить файл</p>
    </div>
    <section class="file-uploader__section progress-area"></section>
    <section class="file-uploader__section uploaded-area">
        <div class="file-uploader__section ui-sortable">
            @if (isset($object) && isset($item_type))
                @php
                    $items = \App\Models\Files::query()
                        ->where('item_type', $item_type)
                        ->where('item_id', $object->id)
                        ->orderBy('rating', 'desc')
                        ->get();
                @endphp
                @foreach ($items as $value)
                    @php
                        $path = 'storage/'.$value['path'];
                        $base_name = basename($path);
                        $size = 0;
                        if (file_exists($path)) {
                            $size = \App\Helpers\Helper::formatBytes(filesize($path));
                        }
                    @endphp
                    <li class="row ui-sortable-handle">
                        <div class="content upload">
                            <i class="fas fa-file-alt"></i>
                            <div class="details">
                                <span class="name">{{$base_name}}</span>
                                <span class="size">{{$size}}</span>
                            </div>
                        </div>
                        <div class="gallery-input-container" style="margin: 0 10px;">
                            <input type="text" class="file-rating" value="{{$value['rating']}}" placeholder="Рейтинг" data-id="{{$value['id']}}">
                            <input type="text" class="file-alt" value="{{$value['name']}}" placeholder="Название" data-id="{{$value['id']}}">
                        </div>
                        <button type="button" class="construct-box-column__delete js-delete-file" data-id="{{$value['id']}}"></button>
                    </li>
                @endforeach
            @endif
        </div>
    </section>
</div>
