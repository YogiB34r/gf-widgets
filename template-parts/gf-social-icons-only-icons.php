<?php
$class = 'list-inline gf-social-icons-list';
if (get_queried_object() && is_product_category()){$class .= ' gf-social-icons-list-category-page';}?>
<ul class="<?=$class?>">
    <li class="list-inline-item">
        <a href="<?=$instance['facebook']?>" class="facebook-icon" title="Facebook"><img src="/wp-content/plugins/gf-widgets/icons/facebook.png" /></a>
    </li>
    <li class="list-inline-item">
        <a href="<?=$instance['instagram']?>" class="instagram-icon"><img src="/wp-content/plugins/gf-widgets/icons/instagram.png" /></a>
    </li>
</ul>