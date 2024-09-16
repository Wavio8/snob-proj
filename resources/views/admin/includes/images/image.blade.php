<div class='input_block input_file_block'>
    <span><?= $title ?>:</span>
    <input id='image_<?= $name ?>' type='file' name='<?= $name ?>' accept='image/*' <?php if($required ?? '') echo 'required' ?>>
    <label for='image_<?= $name ?>'>Выбрать файл</label>
</div>

<?php if ((!empty($object->$name) || !empty($name2)) && $path <> '/storage/'): ?>
    <div class='admin_img_container'>
        <div class='admin_img_card'>
            <div class='card_image_block _transparent'>
                <img src='<?= $path ?> ' alt=''>
            </div>
            <div class='img_card_panel'>

                <a class='img_gallery_open' title='Открыть' target='_blank'
                   href='<?= $path ?>'><i class='material-icons'>open_in_new</i></a>
                <button type='button' class='img_card_delete' data-id='<?= $object->id ?>'
                        data-class='<?= get_class($object) ?>' data-path='<?= $path ?>'
                        data-field='<?= !empty($name2) ? $name2 : $name ?>' title='Удалить'><i class='material-icons'>delete</i></button>
            </div>
        </div>
    </div>
<?php endif; ?>
