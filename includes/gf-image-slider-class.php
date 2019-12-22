<?php

class gf_image_slider_widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'gf_image_slider_widget', // Base ID
            esc_html__('GF Image Slider Widget', 'gf_widgets_domain'), // Name
            array('description' => esc_html__('Image Slider', 'gf_widgets_domain'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        require(realpath(__DIR__ . '/../template-parts/gf-image-slider.php'));

        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {

//        $image_1 = !empty($instance['image_1']) ? $instance['image_1'] : esc_html__('', 'gf_image_slider_widget_domain');
//        $image_1_value = !empty($instance['image_1_value']) ? $instance['image_1_value'] : esc_html__('', 'gf_image_slider_widget_domain');
//        $image_1_link = !empty($instance['image_1_link']) ? $instance['image_1_link'] : esc_html__('https://', 'gf_image_slider_widget_domain');

//        $image_2 = !empty($instance['image_2']) ? $instance['image_2'] : esc_html__('Image 2', 'gf_image_slider_widget_domain');
//        $image_2_value = !empty($instance['image_2_value']) ? $instance['image_2_value'] : esc_html__('', 'gf_image_slider_widget_domain');
//        $image_2_link = !empty($instance['image_2_link']) ? $instance['image_2_link'] : esc_html__('https://', 'gf_image_slider_widget_domain');

//        $image_3 = !empty($instance['image_3']) ? $instance['image_3'] : esc_html__('Image 3', 'gf_image_slider_widget_domain');
//        $image_3_value = !empty($instance['image_3_value']) ? $instance['image_3_value'] : esc_html__('', 'gf_image_slider_widget_domain');
//        $image_3_link = !empty($instance['image_3_link']) ? $instance['image_3_link'] : esc_html__('https://', 'gf_image_slider_widget_domain');

        $items = [];
        for ($i=1; $i<=6; $i++) {
            $items[$i]['image_' . $i] = !empty($instance['image_' . $i]) ? $instance['image_' . $i] : esc_html__('', 'gf_image_slider_widget_domain');
            $items[$i]['image_' . $i . '_value'] = !empty($instance['image_' . $i . '_value']) ? $instance['image_' . $i . '_value'] : esc_html__('', 'gf_image_slider_widget_domain');
            $items[$i]['image_' . $i . '_link'] = !empty($instance['image_' . $i . '_link']) ? $instance['image_' . $i . '_link'] : esc_html__('', 'gf_image_slider_widget_domain');
        }


        foreach ($items as $i => $item) {
            if ($item['image_'. $i .'_value'] == '') {
//                continue;
            }
            ?>
            <div>
                <input
                        class="gf-upload-image-<?=$i?>"
                        id="upload-image-<?=$i?>"
                        name="<?php echo esc_attr($this->get_field_name('image_1')); ?>"
                        type="button"
                        value="Izaberite sliku">
                <input type="button" id="gf-remove-image-<?=$i?>" name="remove-image" value="Obriši sliku">
                <input class="image_<?=$i?>_value"
                       id=" <?php echo esc_attr($this->get_field_id('image_'. $i .'_value')); ?>"
                       type="hidden"
                       name="<?php echo esc_attr($this->get_field_name('image_'. $i .'_value')); ?>"
                       value="<?php echo esc_attr($item['image_'. $i .'_value']); ?>">
                <div class="row">
                    <label for="<?php echo esc_attr($this->get_field_id('image_'. $i .'_link')); ?>">
                        <?php esc_attr_e('Link to:', 'gf_image_slider_widget_domain'); ?>
                    </label>
                    <input class=""
                           id=" <?php echo esc_attr($this->get_field_id('image_'. $i .'_link')); ?>"
                           type="text"
                           name="<?php echo esc_attr($this->get_field_name('image_'. $i .'_link')); ?>"
                           value="<?php echo esc_attr($item['image_'. $i .'_link']); ?>">
                </div>
                <div class="gf-image-preview-wrapper"><img src="<?= esc_attr($item['image_'. $i .'_value']); ?>"></div>
            </div>
            <?php

        }

    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        var_dump($new_instance);
        die();
        $instance['image_1'] = (!empty($new_instance['image_1'])) ? sanitize_text_field($new_instance['image_1']) : '';
        $instance['image_1_value'] = (!empty($new_instance['image_1_value'])) ? sanitize_text_field($new_instance['image_1_value']) : '';
        $instance['image_1_link'] = (!empty($new_instance['image_1_link'])) ? sanitize_text_field($new_instance['image_1_link']) : '';

        $instance['image_2'] = (!empty($new_instance['image_2'])) ? sanitize_text_field($new_instance['image_2']) : '';
        $instance['image_2_value'] = (!empty($new_instance['image_2_value'])) ? sanitize_text_field($new_instance['image_2_value']) : '';
        $instance['image_2_link'] = (!empty($new_instance['image_2_link'])) ? sanitize_text_field($new_instance['image_2_link']) : '';

        $instance['image_3'] = (!empty($new_instance['image_3'])) ? sanitize_text_field($new_instance['image_3']) : '';
        $instance['image_3_value'] = (!empty($new_instance['image_3_value'])) ? sanitize_text_field($new_instance['image_3_value']) : '';
        $instance['image_3_link'] = (!empty($new_instance['image_3_link'])) ? sanitize_text_field($new_instance['image_3_link']) : '';

        return $instance;
    }

}