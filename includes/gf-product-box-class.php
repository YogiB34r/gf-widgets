<?php

class gf_product_box_widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'gf_product_box_widget', // Base ID
            esc_html__('GF Product Box Widget', 'gf_widgets_domain'), // Name
            array('description' => esc_html__('Product Slider Box', 'gf_widgets_domain'),) // Args
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
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        global $post;

        if (isset($instance['category_select']) and !empty($instance['category_select'])) {
            require(realpath(__DIR__ . '/../template-parts/gf-product-box.php'));
        }

        if (isset($args['after_widget'])) {
            echo $args['after_widget'];
        }


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
        if (!empty(get_term_by('slug', 'gf-slider', 'product_cat')->term_id)) {
            $slider_id = get_term_by('slug', 'gf-slider', 'product_cat')->term_id;
            $slider_title = !empty($instance['slider_title']) ? $instance['slider_title'] : esc_html__('', 'gf_product_slider_without_tabs_widget_domain');
            $category_select = !empty($instance['category_select']) ? $instance['category_select'] : esc_html__('', 'gf_product_slider_without_tabs_widget_domain');
            $columns = !empty($instance['number_of_columns']) ? $instance['number_of_columns'] : esc_html__('', 'gf_product_slider_without_tabs_widget_domain');
            $cat_args = array(
                'parent' => $slider_id
            );
            $slider_cat = get_terms('product_cat', $cat_args);
            if (!empty($slider_cat)) {

                $slider_cat_id = get_term_by('slug', $slider_cat[0]->slug, 'product_cat')->term_id;
                $childless_cat = get_terms('product_cat', array('parent' => $slider_cat_id));

                if (isset($instance['category_select']) && !empty($instance['category_select'])) {
                    $slider_cat_id = get_term_by('slug', $instance['category_select'], 'product_cat')->term_id;
                    $childless_cat = get_terms('product_cat', array('parent' => $slider_cat_id));
                }

                if (isset($instance['category_select']) && !empty($instance['category_select'])) {
                    $category_term = get_term_by('slug', $instance['category_select'], 'product_cat');
                    $product_count = $category_term->count;
                }
                if (isset($instance['number_of_columns']) and !empty($instance['number_of_columns'])) {
                    if ($product_count < $instance['number_of_columns']) {
                        if ($product_count >= 6) {
                            $columns = 6;
                        } else {
                            $columns = $product_count;
                        }
                    } else {
                        $columns = $instance['number_of_columns'];
                    }

                } else {
                    $columns = 4;
                }

                ?>

                <div class="gf-product-slider-wrapper">
                    <label for="<?php echo esc_attr($this->get_field_id('slider_title')); ?>">
                        <?php esc_attr_e('Slider Title', 'gf_product_slider_without_tabs_widget_domain'); ?>
                    </label>
                    <input class="gf-slider-title widefat"
                           id="<?php echo esc_attr($this->get_field_id('slider_title')); ?>"
                           type="text"
                           name="<?php echo esc_attr($this->get_field_name('slider_title')); ?>"
                           value="<?php echo esc_attr($slider_title); ?>">
                    <label for="<?php echo esc_attr($this->get_field_id('category_select')); ?>">
                        <?php esc_attr_e('Select category:', 'gf_product_slider_without_tabs_widget_domain'); ?>
                    </label>
                    <select
                        class="gf-category-select widefat"
                        id="<?php echo esc_attr($this->get_field_id('category_select')); ?>"
                        name="<?php echo esc_attr($this->get_field_name('category_select')); ?>">
                        <?php foreach ($slider_cat as $slider_cat_child) : ?>
                            <option
                                <?php if (isset($instance['category_select'])) {
                                    if ($slider_cat_child->slug == $instance['category_select']) {
                                        echo 'selected';
                                    }
                                } ?> value="<?= $slider_cat_child->slug ?>"><?= $slider_cat_child->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <?php
            } else {
                echo 'Nije pronađena nijedna kategorija u Gf slideru!';
            }
        }else{
            echo 'Morate napraviti kategoriju pod imenom "GF Slider"';
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
        $instance['slider_title'] = (!empty($new_instance['slider_title'])) ? sanitize_text_field($new_instance['slider_title']) : '';
        $instance['category_select'] = (!empty($new_instance['category_select'])) ? sanitize_text_field($new_instance['category_select']) : '';

        return $instance;
    }
}