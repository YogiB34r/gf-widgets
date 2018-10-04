

<a href="<?=get_home_url()?>">
    <?php list($width, $height) = getimagesize($instance['logo_image_value']); ?>
    <img class="gf-header-logo" src="<?=$instance['logo_image_value']?>" width="<?=$width?>" height="auto" >
</a>