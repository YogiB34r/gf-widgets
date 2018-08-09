jQuery(document).ready(function($) {
  var custom_uploader;

  function clickHandler(event, input, submitButton, target) {
    event.preventDefault();
    //Extend the wp.media object
    custom_uploader = wp.media.frames.file_frame = wp.media({
      title: 'Upload image',
      button: {
        text: 'Upload'
      },
      multiple: false
    });
    //When a file is selected, grab the URL and set it as the text field's value
    custom_uploader.on('select', function() {
      var attachment = custom_uploader.state().get('selection').first().toJSON();
      input.val(attachment.url);
      $('#widget-gf_image_slider_widget-2-image_1_link').val(' ');
      submitButton.prop('disabled', false);
    });

    //If the uploader object has already been created, reopen the dialog
    if (custom_uploader) {
      custom_uploader.open();
      return;
    }

    //Open the uploader dialog
    custom_uploader.open();
  }

  $('.gf-upload-image-1').click(function(e) {
    clickHandler(e, $('.image_1_value'), $('#widget-gf_image_slider_widget-2-savewidget'));
  });


  $('.gf-upload-image-2').click(function(e) {
    clickHandler(e, $('.image_2_value'), $('#widget-gf_image_slider_widget-2-savewidget'));
  });


  $('.gf-upload-image-3').click(function(e) {
    clickHandler(e, $('.image_3_value'), $('#widget-gf_image_slider_widget-2-savewidget'));
  });
  $('.gf-upload-image-1').click(function(e) {
    clickHandler(e, $('.image_1_value'), $('#widget-gf_image_slider_widget-3-savewidget'));
  });


  $('.gf-upload-image-2').click(function(e) {
    clickHandler(e, $('.image_2_value'), $('#widget-gf_image_slider_widget-3-savewidget'));
  });


  $('.gf-upload-image-3').click(function(e) {
    clickHandler(e, $('.image_3_value'), $('#widget-gf_image_slider_widget-3-savewidget'));
  });

  $('.gf-upload-image-logo').click(function(e) {
    clickHandler(e, $('.logo-image-value'), $('#widget-gf_custom_logo_widget-3-savewidget'));
  });
});

$('#carouselExample').carousel({
  interval: 2000
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
