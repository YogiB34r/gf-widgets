<?php
$category_term = get_term_by('slug', $instance['category_select'], 'product_cat');
$category_link = get_term_link($category_term->term_id);
$products = wc_get_products(array(
    'category' => $instance['category_select'],
));
if(isset($instance['slider_title']) and !empty($instance['slider_title'])){
    $slider_title = $instance['slider_title'];
}else {
    $slider_title = $category_term->name;
}
?>
<div class="row">
    <h3><a href="<?= $category_link ?>"><?= $slider_title ?></a></h3>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>


    <div class="carousel-inner">
        <?php
        $args = array('post_type' => 'product', 'posts_per_page' => 20, 'product_cat' => $instance['category_select'], 'orderby' => 'name');
        $loop = new WP_Query($args);
        $i = 1;
        if(isset($instance['number_of_columns']) and !empty($instance['number_of_columns'])){
            $columns = $instance['number_of_columns'];
        }else{
            $columns = 4;
        }


        while ($loop->have_posts()) :
            $loop->the_post();
            global $product; ?>


            <?php if ($i == 1): ?>
                <div class="carousel-item active">
                <div class="row gf-slider-row">
            <?php endif; ?>

                <div class="col">
                    <a href="<?php echo get_permalink($loop->post->ID) ?>"
                       title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                        <?php woocommerce_show_product_sale_flash($post, $product); ?>
                        <?php if (has_post_thumbnail($loop->post->ID)) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="300px" height="300px" />'; ?>
                        <h5><?php the_title(); ?></h5>
                        <span class="price"><?php echo $product->get_price_html(); ?></span>
                    </a>
                    <?php woocommerce_template_loop_add_to_cart($loop->post, $product); ?>
                </div>

            <?php if ($i %$columns == 0): ?>
                </div> <!-- row gf-slider-row -->
                </div><!-- carousel-item active-->
                <div class="carousel-item">
                    <div class="row gf-slider-row">
            <?php endif ?>
            <?php if ($i >= $category_term->count): ?>
                    </div> <!-- row gf-slider-row -->
                </div><!-- carousel-item active-->
            <?php endif; ?>





                <?php $i++; ?>
            <?php endwhile; ?>
        <?php wp_reset_query(); ?>

    </div><!--    carousel-inner-->

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
