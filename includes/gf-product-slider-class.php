<?php
class gf_product_slider_widget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'gf_product_slider_widget', // Base ID
            esc_html__('GF Product Slider Widget', 'gf_widgets_domain'), // Name
            array('description' => esc_html__('Product Slider', 'gf_widgets_domain'),) // Args
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

        require(realpath(__DIR__ . '/../template-parts/gf-product-slider.php'));

        if (isset($args['after_widget'])){
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
        $slider_id = get_term_by('slug','gf-slider','product_cat')->term_id;
        $slider_title = !empty($instance['slider_title']) ? $instance['slider_title'] : esc_html__('', 'gf_product_slider_widget_domain');
        $category_select = !empty($instance['category_select']) ? $instance['category_select'] : esc_html__('', 'gf_product_slider_widget_domain');
        $columns = !empty($instance['number_of_columns']) ? $instance['number_of_columns'] : esc_html__('', 'gf_product_slider_widget_domain');
        $cat_args = array(
            'parent' => $slider_id
        );
        $slider_cat = get_terms('product_cat', $cat_args);
        if (!empty($instance['category_select'])){
            $category_term = get_term_by('slug', $instance['category_select'], 'product_cat');
            $product_count =$category_term->count;
        }
        if(isset($instance['number_of_columns']) and !empty($instance['number_of_columns'])){
            if ($product_count < $instance['number_of_columns']) {
                $columns = $product_count;
            }else{
                $columns = $instance['number_of_columns'];
            }

        }else{
            $columns = 4;
        }

        $tab_1 = !empty($instance['tab_1']) ? $instance['tab_1'] : esc_html__('', 'gf_product_slider_widget_domain');
        $tab_2 = !empty($instance['tab_2']) ? $instance['tab_2'] : esc_html__('', 'gf_product_slider_widget_domain');
        $tab_3 = !empty($instance['tab_3']) ? $instance['tab_3'] : esc_html__('', 'gf_product_slider_widget_domain');
        $tab_4 = !empty($instance['tab_4']) ? $instance['tab_4'] : esc_html__('', 'gf_product_slider_widget_domain');
        $tab_5 = !empty($instance['tab_5']) ? $instance['tab_5'] : esc_html__('', 'gf_product_slider_widget_domain');

        ?>

        <div>
            <label for="<?php echo esc_attr( $this->get_field_id( 'slider_title' ) ); ?>">
                <?php esc_attr_e( 'Slider Title', 'gf_product_slider_widget_domain' ); ?>
            </label>
            <input class="gf-slider-title widefat"
                   id="<?php echo esc_attr($this->get_field_id('slider_title')); ?>"
                   type="text"
                   name="<?php echo esc_attr($this->get_field_name('slider_title')); ?>"
                   value="<?php echo esc_attr($slider_title); ?>">
           <label for="<?php echo esc_attr( $this->get_field_id( 'category_select' ) ); ?>">
                <?php esc_attr_e( 'Select category:', 'gf_product_slider_widget_domain' ); ?>
           </label>
            <select
               class="gf-category-select widefat"
                id="<?php echo esc_attr($this->get_field_id('category_select')); ?>"
              name="<?php echo esc_attr($this->get_field_name('category_select')); ?>">
               <?php foreach ($slider_cat as $slider_cat_child) : ?>
               <?php var_dump($slider_cat)?>
                  <option value="<?=$slider_cat_child->slug?>"><?=$slider_cat_child->name?></option>
                <?php endforeach;?>
            </select>
           <label for="<?php echo esc_attr( $this->get_field_id( 'number_of_columns' ) ); ?>">
              <?php esc_attr_e( 'Number of columns', 'gf_product_slider_widget_domain' ); ?>
           </label>
            <input class="gf-number-of-columns widefat"
                   id="<?php echo esc_attr($this->get_field_id('number_of_columns')); ?>"
                   type="number"
                 name="<?php echo esc_attr($this->get_field_name('number_of_columns')); ?>"
                  value="<?php echo esc_attr($columns); ?>">

<!--            TABS-->
            <label for="<?php echo esc_attr( $this->get_field_id( 'tab_1' ) ); ?>">
                <?php esc_attr_e( 'Tab 1', 'gf_product_slider_widget_domain' ); ?>
            </label>
            <select
                    class="gf-category-select widefat"
                    id="<?php echo esc_attr($this->get_field_id('tab_1')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('tab_1')); ?>">
                <option value=""><?php _e('Select category')?></option>
                <?php foreach ($slider_cat as $slider_cat_child) : ?>
                    <option value="<?=$slider_cat_child->slug?>"><?=$slider_cat_child->name?></option>
                <?php endforeach;?>
            </select>
            <label for="<?php echo esc_attr( $this->get_field_id( 'tab_2' ) ); ?>">
                <?php esc_attr_e( 'Tab 2', 'gf_product_slider_widget_domain' ); ?>
            </label>
            <select
            class="gf-category-select widefat"
            id="<?php echo esc_attr($this->get_field_id('tab_2')); ?>"
            name="<?php echo esc_attr($this->get_field_name('tab_2')); ?>">
            <option value=""><?php _e('Select category')?></option>
            <?php foreach ($slider_cat as $slider_cat_child) : ?>
                <option value="<?=$slider_cat_child->slug?>"><?=$slider_cat_child->name?></option>
            <?php endforeach;?>
            </select>
            <label for="<?php echo esc_attr( $this->get_field_id( 'tab_3' ) ); ?>">
                <?php esc_attr_e( 'Tab 3', 'gf_product_slider_widget_domain' ); ?>
            </label>
            <select
            class="gf-category-select widefat"
            id="<?php echo esc_attr($this->get_field_id('tab_3')); ?>"
            name="<?php echo esc_attr($this->get_field_name('tab_3')); ?>">
            <option value=""><?php _e('Select category')?></option>
            <?php foreach ($slider_cat as $slider_cat_child) : ?>
                <option value="<?=$slider_cat_child->slug?>"><?=$slider_cat_child->name?></option>
            <?php endforeach;?>
            </select>
            <label for="<?php echo esc_attr( $this->get_field_id( 'tab_4' ) ); ?>">
                <?php esc_attr_e( 'Tab 4', 'gf_product_slider_widget_domain' ); ?>
            </label>
            <select
            class="gf-category-select widefat"
            id="<?php echo esc_attr($this->get_field_id('tab_4')); ?>"
            name="<?php echo esc_attr($this->get_field_name('tab_4')); ?>">
            <option value=""><?php _e('Select category')?></option>
            <?php foreach ($slider_cat as $slider_cat_child) : ?>
                <option value="<?=$slider_cat_child->slug?>"><?=$slider_cat_child->name?></option>
            <?php endforeach;?>
            </select>
            <label for="<?php echo esc_attr( $this->get_field_id( 'tab_5' ) ); ?>">
                <?php esc_attr_e( 'Tab 5', 'gf_product_slider_widget_domain' ); ?>
            </label>
            <select
            class="gf-category-select widefat"
            id="<?php echo esc_attr($this->get_field_id('tab_5')); ?>"
            name="<?php echo esc_attr($this->get_field_name('tab_5')); ?>">
            <option value=""><?php _e('Select category')?></option>
            <?php foreach ($slider_cat as $slider_cat_child) : ?>
                <option value="<?=$slider_cat_child->slug?>"><?=$slider_cat_child->name?></option>
            <?php endforeach;?>
            </select>
        </div>
        <?php
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
        $instance['number_of_columns'] = (!empty($new_instance['number_of_columns'])) ? sanitize_text_field($new_instance['number_of_columns']) : '';
        $instance['tab_1'] = (!empty($new_instance['tab_1'])) ? sanitize_text_field($new_instance['tab_1']) : '';
        $instance['tab_2'] = (!empty($new_instance['tab_2'])) ? sanitize_text_field($new_instance['tab_2']) : '';
        $instance['tab_3'] = (!empty($new_instance['tab_3'])) ? sanitize_text_field($new_instance['tab_3']) : '';
        $instance['tab_4'] = (!empty($new_instance['tab_4'])) ? sanitize_text_field($new_instance['tab_4']) : '';
        $instance['tab_5'] = (!empty($new_instance['tab_5'])) ? sanitize_text_field($new_instance['tab_5']) : '';

        return $instance;
    }
}