<div class='input_block input_file_block'>
    <span><?= $title ?>:</span>
    <input id='gallery_<?= $name ?>' type='file' name='<?= $name ?>[]' accept='image/jpeg,image/png,image/jpg' multiple>
    <label for='gallery_<?= $name ?>'>Выбрать файлы</label>
</div>

<?php if (!empty($images)) : ?>
    <div class='admin_img_container gallery-sortable'>
        <?php foreach ($images as $image): ?>
            <div class='admin_img_card'>
                <div class='card_image_block _transparent'>
                    <img src='/storage/<?= !empty($image->thumbnail) ? $image->thumbnail : $image->original ?>' alt=''>
                </div>
                <div class='img_card_panel'>
                    <div class='gallery-input-container'>
                        <input type='text' class='gallery-rating' value='<?= $image->rating ?>' placeholder='Рейтинг' data-id='<?= $image->id ?>'>
                        <input type='text' class='gallery-alt' value='<?= $image->alt ?>' placeholder='Название' data-id='<?= $image->id ?>'>
                    </div>
                    <a class='img_gallery_open' title='Открыть' target='_blank'
                       href='/storage/<?= $image->original ?>'><i class='material-icons'>open_in_new</i></a>
                    <button type='button' class='img_gallery_delete' data-id='<?= $image->id ?>'
                            data-class='<?= get_class($image) ?>' title='Удалить'
                            data-path='<?= $path ?>'><i class='material-icons'>delete</i></button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
