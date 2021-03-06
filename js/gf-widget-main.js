jQuery(document).ready(function ($) {
    var custom_uploader;

    function clickHandler(event, input, submitButton, target) {
        event.preventDefault();
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Upload image',
            button: {
                text: 'Select'
            },
            multiple: true
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function () {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            input.val(attachment.url);
            submitButton.click();
        });

        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        //Open the uploader dialog
        custom_uploader.open();
        return;
    }

//Gf- image slider
    $('#gf-homepage-row-1').on('click', '.gf-upload-image-1', function (e) {
        clickHandler(e, $('.image_1_value'), $('#widget-41_gf_image_slider_widget-5 input[name="savewidget"]'));
    });
    $('#gf-homepage-row-1').on('click', '.gf-upload-image-2', function (e) {
        clickHandler(e, $('.image_2_value'), $('#widget-41_gf_image_slider_widget-5 input[name="savewidget"]'));
    });
    $('#gf-homepage-row-1').on('click', '.gf-upload-image-3', function (e) {
        clickHandler(e, $('.image_3_value'), $('#widget-41_gf_image_slider_widget-5 input[name="savewidget"]'));
    });
    //remove image
    $('#gf-homepage-row-1').on('click', '#gf-remove-image-1', function () {
        if (confirm("Da li ste sigurni da želite da obrišete sliku ?")) {
            $('.image_1_value').val('');
            $('#widget-41_gf_image_slider_widget-5 input[name="savewidget"]').click();
        }
    });
    $('#gf-homepage-row-1').on('click', '#gf-remove-image-2', function () {
        if (confirm("Da li ste sigurni da želite da obrišete sliku ?")) {
            $('.image_2_value').val('');
            $('#widget-41_gf_image_slider_widget-5 input[name="savewidget"]').click();
        }
    });
    $('#gf-homepage-row-1').on('click', '#gf-remove-image-3', function () {
        if (confirm("Da li ste sigurni da želite da obrišete sliku ?")) {
            $('.image_3_value').val('');
            $('#widget-41_gf_image_slider_widget-5 input[name="savewidget"]').click();
        }
    });



//GF - image banners *************************

    $('#gf-homepage-row-1-mobile').on('click', '.gf-upload-banner-image-1', function (e) {
        clickHandler(e, $('.image_banner_1_value'), $('#widget-gf_image_banners_widget-5-savewidget'));
    });
    $('#gf-homepage-row-1-mobile').on('click', '.gf-upload-banner-image-2', function (e) {
        clickHandler(e, $('.image_banner_2_value'), $('#widget-gf_image_banners_widget-5-savewidget'));
    });
    $('#gf-homepage-row-1-mobile').on('click', '.gf-upload-banner-image-3', function (e) {
        clickHandler(e, $('.image_banner_3_value'), $('#widget-gf_image_banners_widget-5-savewidget'));
    });
    $('#gf-homepage-row-1-mobile').on('click', '.gf-upload-banner-image-4', function (e) {
        clickHandler(e, $('.image_banner_4_value'), $('#widget-gf_image_banners_widget-5-savewidget'));
    });
    $('#gf-homepage-row-1-mobile').on('click', '.gf-upload-banner-image-5', function (e) {
        clickHandler(e, $('.image_banner_5_value'), $('#widget-gf_image_banners_widget-5-savewidget'));
    });
    $('#gf-homepage-row-1-mobile').on('click', '.gf-upload-banner-image-6', function (e) {
        clickHandler(e, $('.image_banner_6_value'), $('#widget-gf_image_banners_widget-5-savewidget'));
    });
    //remove image
    $('#gf-homepage-row-1-mobile').on('click', '#gf-remove-image-banner-1', function () {
        if (confirm("Da li ste sigurni da želite da obrišete sliku ?")) {
            $('.image_banner_1_value').val('');
            $('#widget-gf_image_banners_widget-5-savewidget').click();
        }
    });
    $('#gf-homepage-row-1-mobile').on('click', '#gf-remove-image-banner-2', function () {
        if (confirm("Da li ste sigurni da želite da obrišete sliku ?")) {
            $('.image_banner_2_value').val('');
            $('#widget-gf_image_banners_widget-5-savewidget').click();
        }
    });
    $('#gf-homepage-row-1-mobile').on('click', '#gf-remove-image-banner-3', function () {
        if (confirm("Da li ste sigurni da želite da obrišete sliku ?")) {
            $('.image_banner_3_value').val('');
            $('#widget-gf_image_banners_widget-5-savewidget').click();
        }
    });
    $('#gf-homepage-row-1-mobile').on('click', '#gf-remove-image-banner-4', function () {
        if (confirm("Da li ste sigurni da želite da obrišete sliku ?")) {
            $('.image_banner_4_value').val('');
            $('#widget-gf_image_banners_widget-5-savewidget').click();
        }
    });
    $('#gf-homepage-row-1-mobile').on('click', '#gf-remove-image-banner-5', function () {
        if (confirm("Da li ste sigurni da želite da obrišete sliku ?")) {
            $('.image_banner_5_value').val('');
            $('#widget-gf_image_banners_widget-5-savewidget').click();
        }
    });
    $('#gf-homepage-row-1-mobile').on('click', '#gf-remove-image-banner-6', function () {
        if (confirm("Da li ste sigurni da želite da obrišete sliku ?")) {
            $('.image_banner_6_value').val('');
            $('#widget-gf_image_banners_widget-5-savewidget').click();
        }
    });


//GF- custom logo
    $('#gf-header-row-2-col-1').on('click', '.gf-upload-image-logo', function (e) {
        clickHandler(e, $('.logo-image-value'), $('#widget-gf_custom_logo_widget-3-savewidget'));
    });

//GF- product slider
    $('#gf-homepage-row-2').on('change', '.gf-category-select', function () {
        $('#widget-gf_product_slider_widget-12-savewidget').click();
    });

    /* show lightbox when clicking a thumbnail */
    $('a.thumb').click(function (event) {
        event.preventDefault();
        var content = $('.modal-body');
        content.empty();
        var title = $(this).attr("title");
        $('.modal-title').html(title);
        content.html($(this).html());
        $(".modal-profile").modal({
            show: true
        });
    });
})
;
