$(document).ready(function () {

    $('.add-service-block').click(function () {

        $.ajax({
            url: '/admin/ajax',
            type: 'POST',
            data: {
                action: 'addServiceBlock',
            },
            success: function (html) {
                $('.add-service-block').before(html);
            }
        });

    });

    $('.main_file_delete').click(function () {
        let parent = $(this).parent('.admin_file_container'),
            id = $(this).data('id'),
            className = $(this).data('class'),
            path = $(this).data('path');

        Swal.fire({
            title: 'Вы действительно хотите удалить?',
            text: 'Отменить это действие будет невозможно',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Удалить',
            cancelButtonText: 'Отмена',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '/admin/ajax',
                    type: 'POST',
                    data: {
                        action: 'mainFileDelete',
                        id: id,
                        className: className,
                        path: path,
                    },
                    success: function (data) {
                        if (data === 'success') {
                            parent.remove();

                            Swal.fire({
                                icon: 'success',
                                title: 'Удалено',
                                timer: 1000,
                            });

                        }
                    }
                });
            }
        });
    });

    $('.admin_edit-form').on('click', '.remove-block-upload', function () {

        let item = $(this),
            id = item.data('id');

        if (id == '') {

            item.parent().remove();

        } else if (confirm('Вы действительно хотите удалить?')) {

            $.ajax({
                url: '/admin/ajax',
                type: 'POST',
                data: {
                    action: 'removeServiceBlock',
                    id: id,
                },
                success: function (data) {
                    if (data == 'success') {
                        item.parent().remove();
                    }
                }
            });

        }

    });

    $('.main-video-rating').change(function () {
        let value = $(this).val(),
            id = $(this).data('id');

        $.ajax({
            url: '/admin/ajax',
            type: 'POST',
            data: {
                action: 'changeVideoRating',
                id: id,
                value: value
            },
            success: function (data) {
                console.log(data);
            }
        });
    });

    $('.main_video_delete').click(function () {
        let imgCard = $(this).closest('.admin_img_card'),
            id = $(this).data('id');

        Swal.fire({
            title: 'Вы действительно хотите удалить?',
            text: 'Отменить это действие будет невозможно',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Удалить',
            cancelButtonText: 'Отмена',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '/admin/ajax',
                    type: 'POST',
                    data: {
                        action: 'mainVideoDelete',
                        id: id,
                    },
                    success: function (data) {
                        if (data == 'success') {
                            imgCard.remove();

                            Swal.fire({
                                icon: 'success',
                                title: 'Удалено',
                                timer: 1000,
                            });

                        }
                    }
                });
            }
        });
    });

    $('.bim_video_delete').click(function () {
        let imgCard = $(this).closest('.admin_img_card'),
            id = $(this).data('id');

        Swal.fire({
            title: 'Вы действительно хотите удалить?',
            text: 'Отменить это действие будет невозможно',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Удалить',
            cancelButtonText: 'Отмена',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '/admin/ajax',
                    type: 'POST',
                    data: {
                        action: 'bimVideoDelete',
                        id: id,
                    },
                    success: function (data) {

                        console.log(data);

                        if (data == 'success') {
                            imgCard.remove();

                            Swal.fire({
                                icon: 'success',
                                title: 'Удалено',
                                timer: 1000,
                            });

                        }
                    }
                });
            }
        });
    });

});