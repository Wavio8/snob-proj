if ($('.admin_edit-form button[type=submit]').length && !$('.full-width').length) {
    $('.save').show();
    $('body').on('click', '.save', function (){
        $('.admin_edit-form button[type=submit]').click();
    });
}

$('body').on('keyup', '.client-card-input input, .input-number', function () {
    if (this.value.match(/[^0-9.]/g)) {
        this.value = this.value.replace(/[^0-9.]/g, '');
    }
});

$('body').on('keyup', '.js-input-clear', function () {
    if (this.value.match(/[\~\&\^\|]/g)) {
        this.value = this.value.replace(/[\~\&\^\|]/g, '');
    }
});

$(document).ready(function () {

    // Маска номера телефона
    $("input[name='phone']").not('.select-phone').not('.mask-off').inputmask('+7 (999) 999-99-99');
    $(".select-phone").inputmask('(999) 999-99-99');

    // Маска для поля с рейтингом
    $('.rating-change, .gallery-rating, .main-video-rating, .file-rating').inputmask({
        alias: 'numeric',
        rightAlign: false
    });

    // Уведомление
    $('body').on('click', '.button_alert, #black', function () {
        $('.notice').hide();
    });

    setTimeout(function () {
        $('.notice').fadeOut(150);
    }, 1000);

    // Название файла или кол-во в кнопке выбора файла
    $('.admin_edit-form').on('change', "input[type='file']", function () {
        if ($(this)[0].hasAttribute('multiple')) {

            let count = this.files.length;
            let file = declOfNum(count, ['файл', 'файла', 'файлов']);
            let fileCount = 'Выбрано';

            if (count === 1) {
                // fileCount = 'Выбран';
                $(this).next('label').text(this.files[0].name);
            } else {
                $(this).next('label').text(fileCount + ' ' + count + ' ' + file);
            }

        } else {
            $(this).next('label').text(this.files[0].name);
        }
    });

    $('.gallery-sortable').sortable({
        handle: '.card_image_block',
        // cancel: '',

        placeholder: 'sortable-placeholder-active',
        forcePlaceholderSize: true,
        cursor: 'grabbing',
        start: function (event, ui) {
            ui.item.addClass('sortable-active');
            ui.placeholder.height(ui.item.height() - 4).width(ui.item.width() - 4);
        },
        stop: function (event, ui) {
            ui.item.removeClass('sortable-active');
        },
        update: function (event, ui) {

            let cards = $('.admin_img_card', this),
                count = cards.length;

            cards.each(function(){
                $('.gallery-rating', this).val(--count).trigger('change');
            });

        }
    });

    $('.sortable_list').sortable({
        // handle: '',
        cancel: '.admin_show,a,input,h4,p,span',

        placeholder: 'sortable-list-placeholder',
        forcePlaceholderSize: true,
        cursor: 'grabbing',
        start: function (event, ui) {
            ui.item.addClass('sortable-active');
            ui.placeholder.height(ui.item.innerHeight() - 2);
        },
        stop: function (event, ui) {
            ui.item.removeClass('sortable-active');
        },
        update: function (event, ui) {

            let items = $('.list_item', this),
                count = items.length,
                className = $('.rating-change', this).data('class'),
                array = [];

            items.each(function(){
                let ratingInput = $('.rating-change', this);
                ratingInput.val(--count);
                array[ratingInput.data('id')] = ratingInput.val();
            });

            $.ajax({
                url: '/admin/ajax',
                type: 'POST',
                data: {
                    action: 'sortableRating',
                    array: array,
                    className: className,
                },
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {
                    console.log(data);
                }
            });


        }
    });
});

$('.file-uploader__section.ui-sortable').sortable({

    placeholder: 'sortable-placeholder-active',
    forcePlaceholderSize: true,
    cursor: 'grabbing',
    start: function (event, ui) {
        ui.item.addClass('sortable-active');
        ui.placeholder.height(ui.item.innerHeight() - 2)
    },
    stop: function (event, ui) {
        ui.item.removeClass('sortable-active');
    },
    update: function (event, ui) {

        let cards = $('.row', this),
            count = cards.length;

        cards.each(function(){
            $('.file-rating', this).val(--count).trigger('change');
        });

    }
});

$('.js-admin_nav_title').on('click' , function(){
    var pages = $(this).next();
    if (pages.hasClass('js-admin_nav_pages')){
        if (pages.is(':visible')){
            pages.slideUp();
        }else{
            pages.slideDown();
        }
    }
});

$('.js-modal-search-checkboxes').on('click', function(){

    var token = $('[name=_token]').val();
    var dataUrl = $(this).attr('data-url');
    var dataId = $(this).attr('data-id');
    var dataClass = $(this).attr('data-class');
    var dataInput = $(this).siblings('input[type=hidden]').val();
    var dialogContent = $('.dialog__content');
    var allOption = $(this).attr('data-all-option');
    var dataName =  $(this).attr('data-name');

    dialogOpen();

    dialogContent.html('<div class="loading"></div>')

    $.ajax({
        url: dataUrl,
        type: 'POST',
        data: {
            '_token' : token,
            'id' : dataId,
            'class' : dataClass,
            'data' : dataInput,
            'allOption' : allOption ,
            'name':dataName
        },
        success: function (data) {
            dialogContent.html(data);
            allOptionInit();
        }
    });

});

function allOptionInit() {
    $('.js-all_option input[type="checkbox"]').on('change', function () {
        var allCheckBox = $(this);
        function disableAll() {
            llCheckBox.prop('checked', false);
        }
        $('.search-checkboxes__item input[type="checkbox"]').each(
            function (index, value) {
                if (!$(this).hasClass('all-option-input')) {
                    value.checked = allCheckBox.is(':checked');
                    $(this).off('change', disableAll);
                    $(this).on('change', disableAll.bind('hello'));
                }
            });
    });
};

$(document).on('keypress', '.js-search-checkboxes__search-input', function(event){
    if(event.which == 13) { //enter
        event.preventDefault();
        $('.js-search-checkboxes__search-button').trigger('click');
    }
});

$(document).on('click', '.js-search-checkboxes__search-button', function(){
    var token = $('[name=_token]').val();
    var parent = $(this).closest('.js-search-checkboxes');
    var dataClass = parent.find('.search-checkboxes__class').val();
    var data = $('.'+ dataClass).find('input[type=hidden]').val();
    var dataUrl = parent.attr('data-url');
    var search = parent.find('.js-search-checkboxes__search-input').val();
    var itemsArea = parent.find('.js-search-checkboxes__items');
    var dataName =  parent.attr('data-name');
    itemsArea.html('<div class="loading"></div>');

    $.ajax({
        url: dataUrl,
        type: 'POST',
        data: {
            '_token' : token,
            'search' : search,
            'search_filter' : 1,
            'data' : data,
            'name':dataName
        },
        success: function (data) {
            if (data == '') {
                itemsArea.html('Ничего не найдено');
            }
            else {
                itemsArea.html(data);
            }
        },
        error: function(data) {
            console.log(data);
        }
    });
});

$(document).on('change', '.search-checkboxes input[type=checkbox], textarea[name=search-textbox]', function(){
    var dataClass = $(this)
        .closest('.search-checkboxes__body')
        .find('.search-checkboxes__class')
        .val();
    var input = $('.'+ dataClass).find('input[type=hidden]');
    var str='';
    var checkboxes = $('.search-checkboxes');

    if (checkboxes.find('textarea[name=search-textbox]').length > 0){
        var data = [];
        $('.search-checkboxes__item').each(function(){
            var checkbox = $(this).find('input[type=checkbox]');

            if (checkbox || text)
                data.push({
                    'id': checkbox.val(),
                    'checked': (checkbox.is(':checked') ? 1 : 0),
                    'text' : $(this).find('textarea[name=search-textbox]').val()
                });
        });
        str = JSON.stringify(data);
        input.val(str).trigger('change');
    }
    else {
        checkboxes.find('input[type=checkbox]:checked').each(function(){
            str+=$(this).val()+'|';
        });
        input.val(str.slice(0, -1)).trigger('change');
    }
});

$('.set_status > .checkbox_block_wrap input').on('change', function(){
    $('.js-sets-products').toggle();
});

$('[name=custom_average_review_rating_status]').on('change', function(){
    $('.average-rating-input').toggle();
});

/* --- CHOSEN SELECT --- */

if ($('.chosen').length > 0) {
	$('.chosen').chosen({
		no_results_text: "Ничего не найдено...",
		width:'100%',
		search_contains: true
	});
}
$('body').on('change', '.search-select .chosen, .search-select2 .chosen, .search-select3 .chosen, .search-select4 .chosen, .search-date, .search-checkbox input', function(){
    if ($('.table-order-export').length) $('.table-order-export').val(0);

    var wrap = $(this).closest('.search-wrap-radio');
    if (wrap.length) {
        var parent = $(this).closest('.search-wrap-radio .search-checkbox');
        var input = $('input', parent);
        $('.search-wrap-radio .search-checkbox input').not(input).prop('checked', false);
    }

    var submit = $('.filter_form button[type=submit]');
    if (submit.length) {
        submit.click();
    }
});

$('body').on('click', '.table-sort', function(){
    var field = $(this).attr('data-field');
    var sort = $('.table-sort-value').val();
    var order = $('.table-order-value').val();
    if (sort == field) {
        if (order == 'desc') order = 'asc';
        else order = 'desc';
        $('.table-order-value').val(order);
    }
    $('.table-sort-value').val(field);
    $('.table-order-export').val(0);
    var submit = $('.filter_form button[type=submit]');
    if (submit.length) {
        submit.click();
    }
});

$('body').on('click', '.js-order-export-btn', function(){
    $('.table-order-export').val(1);
    var submit = $('.filter_form button[type=submit]');
    if (submit.length) {
        submit.click();
        $('.table-order-export').val(0);
    }
});

/* --- // --- */


/* --- CHECKBOX BLOCK ALL --- */

$('body').on('change', '.checkbox-multiple-block-all', function(){
    var parent = $(this).closest('.checkbox-multiple');
    if ($(this).prop('checked')) {
        $('.checkbox-multiple-block', parent).prop('checked', true);
    }
    else {
        $('.checkbox-multiple-block', parent).prop('checked', false);
        var not_selected = $('.checkbox-multiple-block-not-selected', parent);
        if (not_selected.length) {
            $('.checkbox-multiple-block-not-selected', parent).prop('checked', true);
            not_selected.prop('checked', true);
        }
    }
});

$('body').on('change', '.checkbox-multiple-block', function(){
    var parent = $(this).closest('.checkbox-multiple');
    if (!$(this).prop('checked')) {
        $('.checkbox-multiple-block-all', parent).prop('checked', false);
    }
    else {
        $('.checkbox-multiple-block-not-selected', parent).prop('checked', false);
    }
    if ($('.checkbox-multiple-block:checked', parent).length == 0 && $('.checkbox-multiple-block-not-selected', parent).length > 0) {
        $('.checkbox-multiple-block-not-selected', parent).prop('checked', true);
    }
});

$('body').on('change', '.checkbox-multiple-block-not-selected', function(){
    var parent = $(this).closest('.checkbox-multiple');
    if ($(this).prop('checked')) {
        $('.checkbox-multiple-block', parent).prop('checked', false);
    }
});

/* --- // --- */

/* --- Banners Type --- */

$('body').on('change', '.banners-type', function(){
    var id = $(this).val();
    $('.banners-size').removeClass('banners-size-show');
    $('.banners-size[data-id='+id+']').addClass('banners-size-show');
});

/* --- // --- */

/* --- Search header --- */

$('body').on('click', '.admin_search_btn', function(){
    $('.admin_search_submit').trigger('click');
});

/* --- // --- */


/* --- Items --- */

$('body').on('click', '.items-add', function(){
    var btn = $(this);
    var id = btn.attr('data-id');
    var table = btn.attr('data-table');
    var type = btn.attr('data-type');
    var fieldset = btn.closest('fieldset');
    var items = $('>.items', fieldset);
    var items_childs = btn.closest('.items-childs');
    btn.addClass('items-add-loading');
    if ($(this).hasClass('items-add-child')) $(this).fadeOut(300);
    $.ajax({
        url: '/admin/ajax',
        type: 'POST',
        data: {
            action: 'items_add',
            table: table,
            id: id,
            type: type
        },
        success: function (html) {
            btn.removeClass('items-add-loading');
            items.append(html);
            if (items_childs.length > 0) {
                btn.addClass('items-add-hide');
            }
        }
    });
});

$('body').on('change', '.items-edit', function(){
    var item_id = $(this).attr('data-id');
    var table = $(this).attr('data-table');
    var type = $(this).attr('data-type');
    var value = $(this).val() || '';
    $.ajax({
        url: '/admin/ajax',
        type: 'POST',
        data: {
            action: 'items_edit',
            table: table,
            item_id: item_id,
            value: value,
            type: type
        },
        success: function (html) {}
    });
});

$('body').on('change', '.items-edit2', function(){
    var item_id = $(this).attr('data-id');
    var table = $(this).attr('data-table');
    var type = $(this).attr('data-type');
    var value = $(this).val() || '';
    $.ajax({
        url: '/admin/ajax',
        type: 'POST',
        data: {
            action: 'items_edit2',
            table: table,
            item_id: item_id,
            value: value,
            type: type
        },
        success: function (html) {}
    });
});

$('body').on('change', '.items-edit3', function(){
    var item_id = $(this).attr('data-id');
    var table = $(this).attr('data-table');
    var type = $(this).attr('data-type');
    var value = $(this).val() || '';
    $.ajax({
        url: '/admin/ajax',
        type: 'POST',
        data: {
            action: 'items_edit3',
            table: table,
            item_id: item_id,
            value: value,
            type: type
        },
        success: function (html) {}
    });
});

$('body').on('change', '.items-edit-checkbox', function(){
    var item_id = $(this).attr('data-id');
    var table = $(this).attr('data-table');
    var field = $(this).attr('data-field');
    var value = 0;
    if ($(this).prop('checked')) value = 1;
    $.ajax({
        url: '/admin/ajax',
        type: 'POST',
        data: {
            action: 'items_edit_checkbox',
            table: table,
            item_id: item_id,
            value: value,
            field: field
        },
        success: function (html) {}
    });
});

$('body').on('click', '.items-edit-delete', function(){
    var table = $(this).attr('data-table');
    var type = $(this).attr('data-type');
    var id = $(this).attr('data-id');
    var parent = $(this).closest('.input_block');
    var fieldset = $(this).closest('fieldset');
    $('.items-add', parent).show();
    Swal.fire({
        title: 'Вы действительно хотите удалить?',
        text: 'Отменить это действие будет невозможно',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Удалить',
        cancelButtonText: 'Отмена',
    }).then((result) => {
        if (result.value) {
            parent.remove();
            $('>.items-add', fieldset).removeClass('items-add-hide');
            $.ajax({
                url: '/admin/ajax',
                type: 'POST',
                data: {
                    action: 'items_delete',
                    table: table,
                    id: id,
                    type: type
                },
                success: function (html) {},
                error: function (html) {console.log(html);},
            });
        }
    });
});

$('body').on('click', '.items-value', function(){
    var name = $(this).html() || '';
    var parent = $(this).closest('.input_block');
    $('.items-edit', parent).val(name).change();
    $('.items-values', parent).hide();
});

$('body').on('focus', '.items-edit', function(){
    var parent = $(this).closest('.input_block');
    $('.items-values', parent).show();
});

$(document).click(function(event){
	if ($(event.target).closest('.items-edit').length) return;

	$('.items-values').hide();

	event.stopPropagation();
});

/* --- Picker --- */

$('body').on('click', '.items-edit-delete-picker', function(){
    var product = $(this).attr('data-product');
    var group = $(this).attr('data-group');
    var parent = $(this).closest('.catalog-attributes-picker-row');
    var fieldset = $(this).closest('fieldset');
    Swal.fire({
        title: 'Вы действительно хотите удалить?',
        text: 'Отменить это действие будет невозможно',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Удалить',
        cancelButtonText: 'Отмена',
    }).then((result) => {
        if (result.value) {
            parent.remove();
            $.ajax({
                url: '/admin/ajax',
                type: 'POST',
                data: {
                    action: 'items_delete_picker',
                    product: product,
                    group: group
                },
                success: function (html) {},
                error: function (html) {console.log(html);},
            });
        }
    });
});


$('body').on('change', '.items-edit-picker', function(){
    var item_id = $(this).attr('data-id');
    var value = $(this).val() || '';
    $.ajax({
        url: '/admin/ajax',
        type: 'POST',
        data: {
            action: 'items_edit_picker',
            item_id: item_id,
            value: value,
        },
        success: function (html) {}
    });
});

$('body').on('click', '.items-add-picker', function(){
    var btn = $(this);
    var product = btn.attr('data-product');
    var fieldset = btn.closest('fieldset');
    var items = $('.input_block', fieldset);
    btn.addClass('items-add-loading');
    $.ajax({
        url: '/admin/ajax',
        type: 'POST',
        data: {
            action: 'items_add_picker',
            product: product
        },
        success: function (html) {
            btn.removeClass('items-add-loading');
            items.append(html);
        }
    });
});

/* --- Chars type --- */

$('body').on('change', '.chars-type-change', function(){
    var id = $(this).val();
    var items = $('.chars-type-items');
    var dop = $('.chars-type-dop');

    items.show();
    if (id == 1) items.hide();

    dop.hide();
    if (id == 4 || id == 5) {
        dop.show();
    }

    var data = $('.admin_edit-form').serialize();
    var url = location.pathname;

    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (data) {
            top.location.href = data;
            //console.log(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
});

/* --- // --- */



$('.admin_content').on('click', '.js-accordion__button', function(){
   var body = $(this).closest('.js-accordion').find('.js-accordion__body');
   if (!body.is(':visible')){
       body.slideDown();
       $(this).addClass('accordion__button_active');
       value = 1;
   }
   else{
       body.slideUp();
       $(this).removeClass('accordion__button_active');
       value = 2;
   }
   var name = $(this).html();
   $.ajax({
       url: '/admin/ajax',
       type: 'POST',
       data: {
           action: 'accordion',
           name: name,
           value: value
       },
       success: function (data) {
           console.log(data);
       },
       error: function (data) {
           console.log(data);
       }
   });
});


$(function(){
    var boxes = $('.js-construct-box');

    $('.js-construct-box-column__add').on('click', function(){
        var column = $(this).closest('.js-construct-box-column');
        var parentId = column.attr('data-parent-id');
        var box = column.closest('.js-construct-box');
        var name = box.attr('data-name');
        var fieldName = parentId ? name+"["+parentId+"]"+"[]" : name+"[]";
        var body = column.find('.js-construct-box-column__body');
        var field = "<div class='construct-box-column__item js-construct-box-column__item'>" +
            "<textarea name='"+fieldName+"'></textarea>" +
            "<button type='button' class='construct-box-column__delete js-construct-box-column__delete'></button>" +
            "</div>"

        body.append(field);
        box.find('input.js-construct-box__edit').val(1)
    });

    $('.js-construct-box textarea').on('change',  function(){
        var box = $(this).closest('.js-construct-box');
        box.find('input.js-construct-box__edit').val(1);
    });

    boxes.on('click', '.js-construct-box-column__delete', function(){
        var box = $(this).closest('.js-construct-box');
        box.find('input.js-construct-box__edit').val(1);

        $(this).parent().remove();
    });
});

function humanFileSize(bytes, si=false, dp=1) {
    const thresh = si ? 1000 : 1024;

    if (Math.abs(bytes) < thresh) {
        return bytes + ' B';
    }

    const units = si
        ? ['kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']
        : ['KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB'];
    let u = -1;
    const r = 10**dp;

    do {
        bytes /= thresh;
        ++u;
    } while (Math.round(Math.abs(bytes) * r) / r >= thresh && u < units.length - 1);


    return bytes.toFixed(dp) + ' ' + units[u];
}

$(function(){

    if ($('.file-uploader__form').length) {

        const form = document.querySelector(".file-uploader__form"),
            fileInput = document.querySelector(".file-uploader .file-input"),
            progressArea = document.querySelector(".file-uploader .progress-area"),
            uploadedArea = document.querySelector(".file-uploader .uploaded-area"),
            uploadedFile = fileInput.files[0];

    // form click event
        form.addEventListener("click", () =>{
            fileInput.click();
        });

        fileInput.onchange = ({target})=>{
            for (const [key, file] of Object.entries(target.files)){
                if(file){
                    let fileName = file.name; //getting file name
                    if(fileName.length >= 25){ //if file name length is greater than 12 then split it and add ...
                        let splitName = fileName.split('.');
                        fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
                    }
                    progressArea.innerHTML = "";
                    let uploadedHTML = `<li class="row new-row">
                                <div class="content upload">
                                  <i class="fas fa-file-alt"></i>
                                  <div class="details">
                                    <span class="name">${fileName}</span>
                                    <span class="size">${humanFileSize(file.size, false)}</span>
                                  </div>
                                </div>
                                <i class="fas fa-check"></i>
                              </li>`;

                    // uploadedArea.innerHTML = uploadedHTML; //uncomment this line if you don't want to show upload history
                    uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML); //remove this line if you don't want to show upload history
                }
            };

        }

    }

});

$('.js-bonus-accrual__button').on('click', function(event){

    event.preventDefault();

    var parent = $(this).closest('.js-bonus-accrual');
    var input = parent.find('.js-bonus-accrual__input');
    var inputDate = parent.find('.js-bonus-accrual__input-date');
    var count = Number(input.val());
    var date = inputDate.val();
    var id = $(this).attr('data-id');
    var type = $(this).attr('data-type');
    var dialogString = 'Начислено '+count+' бонуса(ов)';
    if (!!date) dialogString += ' до '+date;
    var comment = $('.js-bonus-accrual__comment', parent).val();

    if (count == 0) {
        Swal.fire({
            title: 'Введите количество бонусов',
            icon: 'success'
        });
        return false;
    }

    Swal.fire({
        title: dialogString,
        icon: 'success'
    });
    if (type == 'review'){
        var string = "<strong>За отзыв начислено <span>"+count+"</span> бонуса(ов)</strong>";
        if (!!date) string += ' до '+date;
        parent.find('.js-bonus-accrual__grid').remove();
        parent.html(string);
    }
    if (type == 'custom_accrual'){
        input.val('');
        $('.js-bonus-accrual__comment', parent).val('');
        $('.js-bonus-accrual__input-date', parent).val('');
        setTimeout(function(){
            window.location.reload();
        }, 700);
    }

    $.ajax({
        url: '/admin/ajax',
        type: 'POST',
        data: {
            action: 'bonusesAccrual',
            count: count,
            date: date,
            id: id,
            type: type,
            comment: comment
        },
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
});

$('.js-bonus-retrieve__button').on('click', function(event){

    event.preventDefault();

    var parent = $(this).closest('.js-bonus-retrieve');
    var input = parent.find('.js-bonus-retrieve__input');
    var count = Number(input.val());
    var id = $(this).attr('data-id');
    var type = $(this).attr('data-type');
    var dialogString = 'Списано '+count+' бонуса(ов)';
    var comment = $('.js-bonus-retrieve__comment', parent).val();

    if (count == 0) {
        Swal.fire({
            title: 'Введите количество бонусов',
            icon: 'success'
        });
        return false;
    }

    Swal.fire({
        title: dialogString,
        icon: 'success'
    });
    if (type == 'custom_retrieve'){
        input.val('');
        $('.js-bonus-retrieve__comment', parent).val('');
        $('.js-bonus-retrieve__input-date', parent).val('');
        setTimeout(function(){
            window.location.reload();
        }, 700);
    }

    $.ajax({
        url: '/admin/ajax',
        type: 'POST',
        data: {
            action: 'bonusesRetrieve',
            count: count,
            id: id,
            type: type,
            comment: comment
        },
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
});

$('.js-inputs-table__input').on('change', function(){
    var item = $(this);
    var attribute = item.attr('data-attribute');
    var id = item.attr('data-id');
    var value = item.val();
    var token = $('[name=_token]').val();

    $.ajax({
        url: window.location.href,
        type: 'POST',
        data: {
            _token: token,
            attribute_name: attribute,
            id: id,
            value: value
        },
        success: function (data) {
            if (!data) item.css('border-color', 'red');
        },
        error: function (data) {
            console.log(data);
        }
    });
});

/* --- Storage products save --- */

$('.js-storage-products').on('change', function(){
    var item = $(this);
    var product = item.attr('data-product');
    var storage = item.attr('data-storage');
    var value = item.val();
    var token = $('[name=_token]').val();
    $.ajax({
        url: window.location.href,
        type: 'POST',
        data: {
            storage_save: 1,
            _token: token,
            product: product,
            storage: storage,
            value: value,
        },
        success: function (data) {
            if (!data) item.css('border-color', 'red');
        },
        error: function (data) { console.log(data); }
    });
});

$('.js-storage-not-available input').on('change', function(){
    var item = $(this).closest('.js-storage-not-available');
    var product = item.attr('data-product');
    var storage = item.attr('data-storage');
    var not_available = 0;
    if ($(this).prop('checked')) not_available = 1;
    var token = $('[name=_token]').val();
    $.ajax({
        url: window.location.href,
        type: 'POST',
        data: {
            storage_not_available_save: 1,
            _token: token,
            product: product,
            storage: storage,
            not_available: not_available
        },
        success: function (data) {},
        error: function (data) { console.log(data); }
    });
});

$('.js-storage-products-min-quantity').on('change', function(){
    var item = $(this);
    var product = item.attr('data-product');
    var value = item.val();
    var token = $('[name=_token]').val();
    $.ajax({
        url: window.location.href,
        type: 'POST',
        data: {
            storage_save_min_quantity: 1,
            _token: token,
            product: product,
            value: value,
        },
        success: function (data) {
            console.log(data);
        },
        error: function (data) {}
    });
});

$('body').on('change', '.js-storage-products-descr4', function () {
    var item = $(this);
    var product = item.attr('data-product');
    var value = item.val();
    var token = $('[name=_token]').val();
    $.ajax({
        url: window.location.href,
        type: 'POST',
        data: {
            storage_save_descr4: 1,
            _token: token,
            product: product,
            value: value,
        },
        success: function (data) {
            console.log(data);
        },
        error: function (data) {}
    });
});

/* --- Multiple search --- */

$('.checkbox-multiple-search').on('keyup', function () {
    var search = $(this).val().toLowerCase();
    var parent = $(this).closest('.checkbox-multiple');
    $('.checkbox-multiple-search-not-found', parent).hide();
    if (search.length < 1) {
        $('.checkbox-multiple-item', parent).show();
        return;
    }
    var show_count = 0;
    $('.checkbox-multiple-item', parent).each(function(){
        var name = $('.checkbox-multiple-search-name', this).html().toLowerCase();
        if (!isNaN(search) && $('.checkbox-multiple-search-id', this).length) {
            name = $('.checkbox-multiple-search-id', this).html().toLowerCase();
        }
        if (name.indexOf(search) >= 0) {
            $(this).show();
            show_count++;
        }
        else {
            $(this).hide();
        }
    });
    if (show_count == 0) {
        $('.checkbox-multiple-search-not-found', parent).show();
    }
});

/* --- // --- */

/* --- Order Setting --- */

$('body').on('click', '.table-setting-btn', function () {
    var token = $('[name=_token]').val();
    $.ajax({
        url: window.location.href,
        type: 'GET',
        data: {
            'setting_show': 1,
            '_token': token
        },
        success: function (html) {
            var dialogContent = $('.dialog__content');
            dialogOpen();
            dialogContent.html(html)
        },
        error: function (data) {}
    });
});

$('body').on('click', '.table-setting-save', function () {
    var token = $('[name=_token]').val();
    var fields = [];
    $('.table-setting-info-item').each(function(){
        var field = $(this).attr('data-field');
        if (!$('input', this).prop('checked')) {
            fields.push(field);
        }
    });
    var fields_str = fields.join('|');
    $.ajax({
        url: window.location.href,
        type: 'GET',
        data: {
            'setting_save': 1,
            '_token': token,
            'fields_str': fields_str
        },
        success: function (html) {
            window.location.reload();
        },
        error: function (data) {}
    });
});

if ($('.order-list1').length) {
    var destination = $('.order-list1').offset().top;
	destination = destination - 70;
	$('.admin_content.admin_scroll').animate({scrollTop: destination}, 0);
}

$('body').on('click', '.order-product-del', function(){
    var id = $(this).attr('data-id');
    var token = $('[name=_token]').val();
    Swal.fire({
        title: 'Вы действительно хотите удалить товар из заказа?',
        text: 'Отменить это действие будет невозможно',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Удалить',
        cancelButtonText: 'Отмена',
    }).then((result) => {
        if (result.value) {
            dialogloading();
            $.ajax({
                url: window.location.href,
                type: 'POST',
                data: {
                    'order_product_delete': id,
                    '_token': token
                },
                success: function (response) {
                    console.log(response);
                    if(response && !response.status){
                        dialogClose();
                        Swal.fire({
                            title: 'Ошибка',
                            text: response.msg,
                            icon: 'warning',
                        })
                    }else{
                        dialogClose();
                        window.location.href = window.location.pathname + '?list=1';
                    }

                },
                error: function (html) {console.log(html);},
            });
        }
    });
});

$('body').on('click', '.order-product-add', function(){
    var token = $('[name=_token]').val();
    var list = $('.order-product-add-list');
    if (list.css('display') == 'none') {
        list.fadeIn(300);
    }
    else {
        list.hide();
    }
});

$('body').on('click', '.order-product-add-save', function(){
    var token = $('[name=_token]').val();
    var order = $(this).attr('data-order');
    var product = $('.order-product-add-list select').val();
    if (product == 0) {
        Swal.fire({
            title: 'Выберите товар',
            icon: 'error'
        });
        return false;
    }
    Swal.fire({
        title: 'Вы действительно хотите добавить товар в заказ?',
        text: 'Отменить это действие будет невозможно',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Добавить',
        cancelButtonText: 'Отмена',
    }).then((result) => {
        if (result.value) {
            dialogloading();
            $.ajax({
                url: window.location.href,
                type: 'POST',
                data: {
                    'order_product_add': product,
                    'order': order,
                    '_token': token
                },
                success: function (response) {
                    console.log(response);
                    if(response && !response.status){
                        dialogClose();
                        Swal.fire({
                            title: 'Ошибка',
                            text: response.msg,
                            icon: 'warning',
                        })
                    }else{
                        dialogClose();
                        window.location.href = window.location.pathname + '?list=1';
                    }

                },
                error: function (html) {console.log(html);},
            });
        }
    });
});

$('body').on('change', '.js-order-product-quantity', function(event){
    event.preventDefault();
    var token = $('[name=_token]').val();
    var id = $(this).attr('data-id');
    var quantity = Number($(this).val());
    if (quantity < 0) {
        quantity = 1;
        $this.val(quantity);
    }
    if (quantity > 1000) {
        quantity = 1000;
        $this.val(quantity);
    }
    Swal.fire({
        title: 'Вы действительно хотите изменить количество товара в заказе на «'+quantity+'»?',
        text: 'Отменить это действие будет невозможно',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Изменить',
        cancelButtonText: 'Отмена',
    }).then((result) => {
        if (result.value) {
            dialogloading();
            $.ajax({
                url: window.location.href,
                type: 'POST',
                data: {
                    'order_product_quantity': id,
                    'quantity': quantity,
                    '_token': token
                },
                success: function (response) {
                    console.log(response);
                    if(response && !response.status){
                        dialogClose();
                        Swal.fire({
                            title: 'Ошибка',
                            text: response.msg,
                            icon: 'warning',
                        }).then(()=>{
                            window.location.href = window.location.pathname + '?list=1';
                        })
                    }else{
                        dialogClose();
                        window.location.href = window.location.pathname + '?list=1';
                    }

                },
                error: function (html) {console.log(html);},
            });
        }
    });
});

$('body').on('click', '.js-order-bonuses-save', function(event){
    event.preventDefault();
    var token = $('[name=_token]').val();
    var id = $(this).attr('data-id');
    var bonuses = Number($('.js-order-bonuses-input').val());
    if (bonuses == 0) {
        Swal.fire({
            title: 'Заполните бонусы',
            icon: 'error'
        });
        return false;
    }
    var bonuses_max = Number($('.js-order-bonuses-max').html());
    if (bonuses_max == 0) {
        Swal.fire({
            title: 'У пользователя нет бонусов'
        });
        return false;
    }
    if (bonuses > bonuses_max) {
        Swal.fire({
            title: 'У пользователя доступно '+bonuses_max+' бонуса(ов)'
        });
        return false;
    }
    Swal.fire({
        title: 'Вы действительно хотите пересчитать бонусы?',
        text: 'Отменить это действие будет невозможно',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Пересчитать',
        cancelButtonText: 'Отмена',
    }).then((result) => {
        if (result.value) {
            dialogloading();
            $.ajax({
                url: window.location.href,
                type: 'POST',
                data: {
                    'order_bonuses': id,
                    'bonuses': bonuses,
                    '_token': token
                },
                success: function (html) {
                    dialogClose();
                    console.log(html);
                    window.location.href = window.location.pathname + '?list=1';
                },
                error: function (html) {console.log(html);},
            });
        }
    });
});

$('body').on('click', '.js-order-promocode-save', function(event){
    event.preventDefault();
    var token = $('[name=_token]').val();
    var id = $(this).attr('data-id');
    var promocode = $('.js-order-promocode-input').val().trim();
    if (promocode == '') {
        Swal.fire({
            title: 'Введите промокод'
        });
        return false;
    }
    Swal.fire({
        title: 'Вы действительно хотите применить промокод?',
        text: 'Отменить это действие будет невозможно',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Применить',
        cancelButtonText: 'Отмена',
    }).then((result) => {
        if (result.value) {
            dialogloading();
            $.ajax({
                url: window.location.href,
                type: 'POST',
                data: {
                    'order_promocode': id,
                    'promocode': promocode,
                    '_token': token
                },
                success: function (html) {
                    dialogClose();
                    if (html != '') {
                        Swal.fire({
                            title: html
                        });
                    }
                    else {
                        console.log(html);
                        window.location.href = window.location.pathname + '?list=1';
                    }
                },
                error: function (html) {console.log(html);},
            });
        }
    });
});

$('body').on('change', '.js-order-check-all input[type=checkbox]', function(){
    if ($(this).prop('checked')) {
        $('.js-order-check input[type=checkbox]').prop('checked', true);
    }
    else {
        $('.js-order-check input[type=checkbox]').prop('checked', false);
    }
});

$('body').on('change', '.js-order-check input[type=checkbox]', function(){
    var count = $('.js-order-check input[type=checkbox]').length;
    var count_checked = $('.js-order-check input[type=checkbox]:checked').length;
    if (count == count_checked) {
        $('.js-order-check-all input[type=checkbox]').prop('checked', true);
    }
    else {
        $('.js-order-check-all input[type=checkbox]').prop('checked', false);
    }
});

$('body').on('click', '.js-order-group-save', function(){
    var parent = $(this).closest('.group');
    var status = Number($('.js-order-group-status', parent).val());
    if (status == 0) {
        Swal.fire({
            title: 'Статус не выбран',
            icon: 'error'
        });
        return false;
    }
    var count_checked = $('.js-order-check input[type=checkbox]:checked').length;
    if (count_checked == 0) {
        Swal.fire({
            title: 'Не выбрано ни одного заказа',
            icon: 'success'
        });
        return false;
    }
    var dialogContent = $('.dialog__content');
    dialogOpen();
    dialogContent.html('<div class="loading"></div>')

    var ids = [];
    $('.js-order-check input[type=checkbox]:checked').each(function(){
        var id = $(this).closest('.js-order-check').attr('data-id');
        ids.push(id);
    });
    ids_str = ids.join('|');
    $.ajax({
        url: window.location.href,
        type: 'GET',
        data: {
            status_change: status,
            ids_str: ids_str,
        },
        success: function (data) {
            dialogClose();
            Swal.fire({
                title: 'Изменено',
                icon: 'success'
            });
            setTimeout(function(){
                 top.location.reload();
            }, 1000);
        },
        error: function (data) { console.log(data); }
    });
});

/* --- Product type select --- */

$('body').on('change', '.js-product-type-select select', function(){
    var val = $(this).val();
    if (val == 3) {
        $('.js-present-wrap').show();
    }
    else {
        $('.js-present-wrap').hide();
    }
});

/* --- // --- */

$('body').on('change', '.catalog-waiting-call-wrap input', function(){
    var id = $(this).closest('.catalog-waiting-call-wrap').attr('data-id');
    var value = 0;
    if ($(this).prop('checked')) value = 1;
    $.ajax({
        url: window.location.href,
        type: 'GET',
        data: {
            'call_save': id,
            'call_value': value,
        },
        success: function (html) {console.log(html);},
        error: function (html) {console.log(html);},
    });
});

/* --- Multiple sorting --- */

$('body').on('click', '.checkbox-multiple-arrow-up, .checkbox-multiple-arrow-down', function(){
    var wrapper = $(this).closest('.checkbox-multiple-item');
    if ($(this).hasClass('checkbox-multiple-arrow-down')) {
        wrapper.insertAfter(wrapper.next());
    }
    else {
        wrapper.insertBefore(wrapper.prev());
    }
    wrapper.addClass('checkbox-multiple-item-active');
    setTimeout(function(){
        wrapper.removeClass('checkbox-multiple-item-active');
    }, 1200);
});

/* --- PromoCodes auto --- */

$('body').on('change keyup', '.js-promocodes-auto-input input', function(event){
    var count = Number($(this).val());
    if (count > 1000) {
        $(this).val(1000);
        Swal.fire({
            title: 'Максимальное количество которое можно сгенерировать за раз: 1000',
            icon: 'error'
        });
        event.preventDefault();
        return false;
    }
});
$('body').on('click', '.js-promocodes-auto-submit', function(event){
    var input = $('.js-promocodes-auto-input input');
    var count = Number(input.val());
    input.removeClass('input-red');
    if (count == 0) {
        event.preventDefault();
        setTimeout(function(){
            input.addClass('input-red');
        }, 100);
        return false;
    }
    else {
        $('input[name=code]').attr('required', false);
        if (!confirm('Вы действительно хотите сгенерировать '+count+' промокода (ов)')) {
            event.preventDefault();
            return false;
        }
    }
});
$('body').on('click', '.js-promocode-hide-btn', function(event){
    if (!confirm('Вы действительно хотите отключить навсегда? Отменить действие будет невозможно')) {
        event.preventDefault();
        return false;
    }
    else {
        $('.js-promocode-hide').val(1);
    }
});

/* --- Client --- */

$('body').on('click', '.btn-link-scroll', function(event){
    var id = $(this).attr('data-id');
    if (!$('#'+id).length) return;
    var destination = $('#'+id).offset().top;
	destination = destination - 60;
	$('.admin_content.admin_scroll').animate({scrollTop: destination}, 500);
});

$('body').on('click', '.table-detail-btn', function(event){
    event.preventDefault();
    var parent = $(this).parent();
    var content = $('.table-detail-content', parent).html();
    var dialogContent = $('.dialog__content');
    dialogOpen();
    dialogContent.html(content);
});

/* --- Order --- */

$('body').on('click', '.order-edit-link', function(event){
    var id = $(this).attr('data-id');
    if (!$('#'+id).length) return;
    $('#'+id).show();
    var destination = $('#'+id).offset().top;
	destination = destination - 90;
	$('.admin_content.admin_scroll').animate({scrollTop: destination}, 500);
});

/* --- Storage Save --- */

$('body').on('click', '.js-storage-save', function(){
    Swal.fire({
        title: 'Вы действительно сохранить заполненные данные?',
        text: 'Отменить это действие будет невозможно',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Сохранить',
        cancelButtonText: 'Отмена',
    }).then((result) => {
        if (result.value) {
            var token = $('[name=_token]').val();
            var save = '';
            $('.js-inputs-table tbody tr').each(function(){
                save += '|';
                var product = $(this).attr('data-product');
                save += product+'^';
                $('td', this).each(function(){
                    var input_storage = $('input[name=storage]', this);
                    if (input_storage.length) {
                        var storage = input_storage.attr('data-storage');
                        save += '&'+storage+'-'+input_storage.val();
                        var input_not_available = $('input[name=not_available]', this);
                        if (input_not_available.length) {
                            var input_not_available_val = input_not_available.prop('checked') ? 1 : 0;
                            save += '-'+input_not_available_val;
                        }
                    }
                    var input_descr4 = $('textarea[name=descr4]', this);
                    if (input_descr4.length) {
                        save += '^'+input_descr4.val();
                    }
                    var input_min_quantity = $('input[name=min_quantity]', this);
                    if (input_min_quantity.length) {
                        save += '^'+input_min_quantity.val();
                    }
                });
            });

            var dialogContent = $('.dialog__content');
            dialogOpen();
            dialogContent.html('<div class="loading"></div>')

            $.ajax({
                url: window.location.href,
                type: 'POST',
                data: {
                    save: save,
                    _token: token,
                },
                success: function (data) {
                    console.log(data);
                    dialogClose();
                    Swal.fire({
                        title: 'Сохранено',
                        icon: 'success'
                    });
                    //setTimeout(function(){window.location.reload()}, 1000);
                },
                error: function (data) { console.log(data); }
            });
        }
    });
});

$('body').on('click', '.storage-products-editor-btn', function(){
    var parent = $(this).parent();
    var wrap = $('.storage-products-editor', parent);
    $('.storage-products-editor').not(wrap).hide();
    $('.storage-products-editor-btn').html('Заполнить descr4');
    if (wrap.css('display') == 'none') {
        wrap.fadeIn(300);
        $(this).html('Скрыть descr4');
    }
    else {
        wrap.fadeOut(300);
    }
});

$(document).click(function(event){
	if ($(event.target).closest('.storage-products-editor-wrap').length) return;
	if ($(event.target).closest('.storage-products-editor-btn').length) return;

	$('.storage-products-editor').hide();
    $('.storage-products-editor-btn').html('Заполнить descr4');

	event.stopPropagation();
});

/* --- Promo product del --- */

$('body').on('click', '.js-promo-products-del', function(){
    var id = $(this).attr('data-id');
    var token = $('[name=_token]').val();
    Swal.fire({
        title: 'Вы действительно хотите удалить привязанный товар?',
        text: 'Отменить это действие будет невозможно',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Удалить',
        cancelButtonText: 'Отмена',
    }).then((result) => {
        if (result.value) {
            $('#promo-products'+id).remove();
            $.ajax({
                url: location.pathname,
                type: 'POST',
                data: {
                    'promo_product_delete': id,
                    '_token': token
                },
                success: function (html) {console.log(html);},
                error: function (html) {console.log(html);},
            });
        }
    });
});

/* --- Template Sms --- */

function template_sms_view(){
    var content = $('.js-template-sms-content').val();
    $('.js-template-sms-view').html(content);
}
template_sms_view();
$('body').on('keyup change', '.js-template-sms-content', function(){
    template_sms_view();
});

/* --- // --- */
