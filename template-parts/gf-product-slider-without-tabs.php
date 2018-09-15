<?php
$random_id = rand();
$category_term = get_term_by('slug', $instance['category_select'], 'product_cat');
$category_link = get_term_link($category_term->term_id);
$products = wc_get_products(array(
    'category' => $instance['category_select'],
));
if (isset($instance['slider_title']) and !empty($instance['slider_title'])) {
    $slider_title = $instance['slider_title'];
} else {
    $slider_title = $category_term->name;
}
$columnCount = (int) $instance['number_of_columns'];
if ($columnCount === 0) {
    $columnCount = 5;
}
?>

<div id="<?php echo $random_id; ?>" class="gf-product-slider">
    <div class="row gf-product-slider__header gf-product-slider__header--without-tabs">
        <h3 class="gf-product-slider__header__title"><a href="<?= $category_link ?>"><?= $slider_title ?></a></h3>

        <div class="gf-product-slider__header__controls gf-product-slider__header__controls--without-tabs">
          <a class="product-slider__control-prev gf-product-slider__header-control" href="#" role="button">
              <i class="fas fa-angle-left product-slider__control-prev-icon"></i>
            </a>
            <a class="product-slider__control-next gf-product-slider__header-control" href="#" role="button">
              <i class="fas fa-angle-right product-slider__control-next-icon"></i>
            </a>
        </div>
    </div>

    <div class="slider-inner without-tabs">
        <?php
        $args = array('post_type' => 'product', 'posts_per_page' => 20, 'product_cat' => $instance['category_select'], 'orderby' => 'name',
            'meta_query' => array(
                array(
                    'key' => '_stock_status',
                    'value' => 'instock'
                ),
            ));
        $loop = new WP_Query($args);
        while ($loop->have_posts()) :
            $loop->the_post();
            global $product; ?>
            <div class="slider-item">
                <a href="<?php echo get_permalink($loop->post->ID) ?>"
                   title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                    <?php woocommerce_show_product_sale_flash($post, $product); ?>
                    <?php add_stickers_to_products_new();
                    add_stickers_to_products_soldout()?>
                    <?php if (has_post_thumbnail($loop->post->ID)) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="300px" height="300px" />'; ?>
                    <h5><?php the_title(); ?></h5>
                    <span class="price"><?php echo $product->get_price_html(); ?></span>
                </a>
                <?php woocommerce_template_loop_add_to_cart($loop->post, $product); ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    </div><!--    slider-inner-->
</div>
<script>
    var gfSliderColumnCount = <?=$columnCount;?>;
</script>
