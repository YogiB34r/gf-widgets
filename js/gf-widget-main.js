jQuery(document).ready(function($) {
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
        custom_uploader.on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            input.val(attachment.url);
            submitButton.prop('disabled', false);
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
    $('#gf-homepage-row-1').on('click', '.gf-upload-image-1', function(e) {
        clickHandler(e, $('.image_1_value'), $('#widget-41_gf_image_slider_widget-2 input[name="savewidget"]'));
    });
    $('#gf-homepage-row-1').on('click', '.gf-upload-image-2', function(e) {
        clickHandler(e, $('.image_2_value'), $('#widget-41_gf_image_slider_widget-2 input[name="savewidget"]'));
    });
    $('#gf-homepage-row-1').on('click', '.gf-upload-image-3', function(e) {
        clickHandler(e, $('.image_3_value'), $('#widget-41_gf_image_slider_widget-2 input[name="savewidget"]'));
    });


//GF- custom logo
    $('#gf-header-row-2-col-1').on('click', '.gf-upload-image-logo', function(e) {
        clickHandler(e, $('.logo-image-value'), $('#widget-gf_custom_logo_widget-3-savewidget'));
    });

//GF- product slider
    $('#gf-homepage-row-2').on('change', '.gf-category-select', function(){
        $('#widget-gf_product_slider_widget-12-savewidget').click();
        console.log('hi')
    });

/* show lightbox when clicking a thumbnail */
$('a.thumb').click(function(event) {
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
});