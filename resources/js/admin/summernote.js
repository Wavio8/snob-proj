const uplaodImage = (file, editor) => {
    const formData = new FormData();
    formData.append("action", "imgUpload");
    formData.append("file", file);
    $.ajax({
        method: "POST",
        url: "/admin/ajax",
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (src) {
            editor.summernote("insertImage", src);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error(textStatus + " " + errorThrown);
        },
    });
}

const deleteImage = (src) => {
    const formData = new FormData();
    formData.append("action", "editorImageDelet");
    formData.append("src", src);
    $.ajax({
        method: "POST",
        url: "/admin/ajax",
        contentType: false,
        cache: false,
        processData: false,
        data: formData,
        success: function (resp) {},
        error: function (jqXHR, textStatus, errorThrown) {},
    });
}


export const summernoteConfig = {
    height: 300,
    lang: "ru-RU",
    callbacks: {
        onImageUpload: function (files) {
            for (let i = 0; i < files.length; i++) {
                uplaodImage(files[i], $(this));
            }
        },
        onMediaDelete : function(target) {
            // alert(target[0].src) 
            deleteImage(target[0].src);
        }
    },
};

$(document).ready(function () {
    $(".editor").summernote(summernoteConfig);
});
