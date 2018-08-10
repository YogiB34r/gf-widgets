

<div id="carouselExample" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExample" data-slide-to="1"></li>
        <li data-target="#carouselExample" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="<?= $instance['image_1_link'] ?>">
                <img class="d-block w-100" src="<?= $instance['image_1_value'] ?>" alt="First slide">
            </a>
        </div>
        <div class="carousel-item">
            <a href="<?= $instance['image_2_link'] ?>">
                <img class="d-block w-100" src="<?= $instance['image_2_value'] ?>" alt="First slide">
            </a>
        </div>
        <div class="carousel-item">
            <a href="<?= $instance['image_3_link'] ?>">
                <img class="d-block w-100" src="<?= $instance['image_3_value'] ?>" alt="First slide">
            </a>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
