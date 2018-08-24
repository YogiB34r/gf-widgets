<?php
$stickerPlugin = new Woo_Stickers_By_Webline_Public('woo-stickers-by-webline','1.1.1');
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
?>
<div class="gf-category-box">
    <div class="row gf-category-box__header">
        <h3 class="gf-category-box__header__title"><a href="<?= $category_link ?>"><?= $slider_title ?></a></h3>
    </div>
    <div class="row gf-category-box__body">
        <?php
        $args = array('post_type' => 'product', 'posts_per_page' => 6, 'product_cat' => $instance['category_select'], 'orderby' => 'name');
        $loop = new WP_Query($args);
        while ($loop->have_posts()) :
            $loop->the_post();
            global $product; ?>
            <div class="col-6 col-md-4 col-lg-3 col-xl-2 gf-category-box__item">
                <a href="<?php echo get_permalink($loop->post->ID) ?>"
                   title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                    <?php woocommerce_show_product_sale_flash($post, $product); ?>
                    <?php $stickerPlugin->show_product_soldout_badge();
                    $stickerPlugin->show_product_new_badge()
                    ?>
                    <?php if (has_post_thumbnail($loop->post->ID)) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="300px" height="300px" />'; ?>
                    <h5><?php the_title(); ?></h5>
                    <span class="price"><?php echo $product->get_price_html(); ?></span>
                </a>
                <?php woocommerce_template_loop_add_to_cart($loop->post, $product); ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
    </div><!--gf-category-body-->
</div>
