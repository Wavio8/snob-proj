

const adminStartup = () => {
    // legacy code ...

    $('.gallery-alt').change(function () {
        let value = $(this).val(),
            id = $(this).data('id');

        $.ajax({
            url: '/admin/ajax',
            type: 'POST',
            data: {
                action: 'changeImageAlt',
                id: id,
                value: value
            },
            success: function (data) {
                console.log(data);
            }
        });
    });
};

export default adminStartup;
