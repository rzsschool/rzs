<?php get_header(); ?>

<!-- Header Start -->
<header class="container-fluid bg-primary px-0 px-md-5 mb-5 py-3" >
    <div class="row align-items-center px-3" style="margin-right: 0; padding-right: 0 !important;">
        <div class="col-lg-6 text-center text-lg-left" data-aos="fade-right" >
        <!-- <div class="col-lg-6 text-center text-lg-left"> -->
            <h4 class="text-white mb-4 mt-5 mt-lg-0">Вас вітає</h4>
            <h1 class="text-white">Комунальний заклад "Розсошенська гімназія<br> Щербанівської сільської ради
                <br>Полтавського району<br> Полтавської області"!</h1>
            <!-- <p class="text-white mb-4">Ознайомитись з картою сайту</p>
            <a href="" class="btn btn-secondary mt-1 py-3 px-5">тисніть тут</a> -->
        </div>
        <div class="col-lg-6 text-center text-lg-right" data-aos="flip-right">
        <!-- <div class="col-lg-6 text-center text-lg-right"> -->
            <img class="img-fluid " src="<?php echo get_template_directory_uri(); ?>/assets/img/header.png" alt="">
        </div>
    </div>
</header>
<!-- Header End -->

<?php 
    $posts = get_posts( array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'alerts',
        'suppress_filters' => true,
    ) );
    // global $post;

    foreach( $posts as $post ){
        setup_postdata( $post );
?>
<div class="px-3" data-aos="fade-up">
<!-- <div class="px-3"> -->
    <div class="container alert alert-<?php the_field('style'); ?>" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading"><?php the_title(); ?></h4>
        <?php echo $post->post_content; ?>
    </div>
</div>

<?php
    }
    wp_reset_postdata();
?>



<!-- Facilities Start -->
<div class="container-fluid pt-5">
    <div class="container pb-3">
        <div class="row">

<?php 
    $posts = get_posts( array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'facility',
        'suppress_filters' => true,
    ) );
    // global $post;
    $i = 0;
    $left_right = ['left', 'right'];
    foreach( $posts as $post ){
        setup_postdata( $post );
?>

            <div class="col-lg-4 col-md-6 pb-1"
                data-aos="flip-<?php echo $left_right[$i % 2]; ?>" 
                data-aos-duration="<?php echo 200 + 100 * ($i % 3 + 1); ?>">
            <!-- <div class="col-lg-4 col-md-6 pb-1"> -->
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                    <i class="flaticon-<?php the_field('class_name_icon') ?> h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4><?php the_title() ?></h4>
                        <div class="m-0"><?php the_content(); ?></div>
                    </div>
                </div>
            </div>
<?php
        $i++;
    }
    wp_reset_postdata();
?>
        </div>
    </div>
</div>
<!-- Facilities Start -->


<!-- Administration Start -->
<?php 
    $posts = get_posts( array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'ASC',
        'meta_key'		=> 'is_administration',
	    'meta_value'	=> true,
        'post_type'     => 'person',
        'suppress_filters' => true,
    ) );
    // global $post;

    if ($posts){
?>


<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2" data-aos="flip-down">
        <!-- <div class="text-center pb-2"> -->
            <p class="section-title px-5"><span class="px-2">Наша команда</span></p>
            <h1 class="mb-4">Адміністрація школи</h1>
        </div>
        <div class="row">

<?php 
        $i = 0;
        foreach( $posts as $post ){
            setup_postdata( $post );
            $fields = get_fields($post);
?>

            <div class="col-md-6 col-lg-3 text-center team mb-5" 
                data-aos="zoom-in" 
                data-aos-duration="<?php echo 200 + 100 * ($i % 4 + 1); ?>">
            <!-- <div class="col-md-6 col-lg-3 text-center team mb-5"> -->
                <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                    <img class="img-fluid w-100" src="<?php echo $fields['photo']; ?>" alt="administration">
                    <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">

            <?php $social_link = $fields['facebook']; 
                if ($social_link) {
            ?>
                        <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                           href="<?php echo $social_link; ?>" target="_blank"><i class="fab fa-facebook-f"></i>
                        </a>
            <?php
                }
                $social_link = $fields['youtube']; 
                if ($social_link) {
            ?>
                        <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                           href="<?php echo $social_link; ?>" target="_blank"><i class="fab fa-youtube"></i>
                        </a>
            <?php
                }
                $social_link = $fields['blogger'];
                if ($social_link) {
            ?>
                        <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                           href="<?php echo $social_link; ?>" target="_blank"><i class="fab fa-blogger-b"></i>
                        </a>
            <?php
                }
                $social_link = $fields['instagram'];
                if ($social_link) {
            ?>
                        <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                           href="<?php echo $social_link; ?>" target="_blank"><i class="fab fa-instagram"></i>
                        </a>
            <?php
                }
                $social_link = $fields['twitter'];
                if ($social_link) {
            ?>
                        <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                           href="<?php echo $social_link; ?>" target="_blank"><i class="fab fa-twitter"></i>
                        </a>
            <?php
                }
            ?>
                    </div>
                </div>
                <h4><?php the_title(); ?></h4>
                <i><?php the_field('position'); ?></i>
            </div>

<?php
            $i++;
        }
?>
        </div>
    </div>
</div>
<?php
    }
    wp_reset_postdata();
?>
<!-- Administration End -->


<!-- Parents Start -->
<div class="container-fluid py-5">
    <div class="container p-0">
        <div class="text-center pb-2" data-aos="flip-up">
        <!-- <div class="text-center pb-2"> -->
            <p class="section-title px-5"><span class="px-2">Відгуки</span></p>
            <h1 class="mb-4">Що про нас чути!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">

<?php 
    $posts = get_posts( array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'testimonial',
        'suppress_filters' => true,
    ) );
    // global $post;

    foreach( $posts as $post ){
        setup_postdata( $post );
?>
            <div class="testimonial-item px-3">
                <div class="bg-light shadow-sm rounded mb-4 p-4">
                    <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                    <?php the_content(); ?>
                </div>
                <div class="d-flex align-items-center">
                    <img class="rounded-circle" src="<?php the_field('photo'); ?>" style="width: 70px; height: 70px;"
                         alt="Image">
                    <div class="pl-3">
                        <h5><?php the_title(); ?></h5>
                        <i><?php the_field('profession'); ?></i>
                    </div>
                </div>
            </div>
<?php
    }
        wp_reset_postdata();
?>

        </div>
    </div>
</div>
<!-- Parents End -->

<!-- Blog Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2" data-aos="flip-left">
        <!-- <div class="text-center pb-2"> -->
            <p class="section-title px-5"><span class="px-2">Наш блог</span></p>
            <h1 class="mb-4">Останні новини</h1>
        </div>
        <div class="row pb-3">
<?php 
    $posts = get_posts( array(
        'numberposts' => 3,
        'orderby'     => 'date',
        'order'       => 'DESC',
        // 'post_type'   => 'post',
        'suppress_filters' => true,
    ) );
    // global $post;
    $i = 0;
    foreach( $posts as $post ){
        setup_postdata( $post );
        $fields = get_fields($post);
?>
            <div class="col-lg-4 mb-4" 
                data-aos="zoom-in-up"
                data-aos-duration="<?php echo 200 + 100 * ($i % 3 + 1); ?>">
            <!-- <div class="col-lg-4 mb-4"> -->
                <div class="card border-0 shadow-sm mb-2">
<?php 
        $thumbnail = get_the_post_thumbnail_url();
        $categories = get_the_category($post->ID);
        if ($thumbnail) {
?>
                    <img class="card-img-top mb-2" src="<?php echo $thumbnail ?>" alt="post_img">
<?php
        } else {
            $image = get_field('image', $categories[0]);
?>
                    <img class="card-img-top mb-2" src="<?php echo $image ?>" alt="post_img">
<?php
        }
?>
                    <div class="card-body bg-light text-center p-4">
                        <h4 class=""><?php the_title(); ?></h4>
                        <div class="d-flex justify-content-center ">
<?php
        if ($fields['author']) {
            $full_name = $fields['author']->post_title;
?>
                            <small class="mr-3"><i class="fa fa-user text-primary"></i> <?php echo get_surname_and_initials($full_name); ?></small>
<?php
        }
?>
                            <small class="mr-3">
                                <i class="fa fa-folder text-primary"></i> 
                                <?php echo $categories[0]->name?>
                            </small>
                        </div>
                        <div class="mb-3">
                            <small class="mr-3"><i class="fa fa-calendar-day text-primary"></i> 
                            <?php echo get_format_date($post->post_date); ?></small>
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div><?php echo get_preview_content(get_the_content()); ?></div>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary px-4 mx-auto my-2">Читати далі</a>
                    </div>
                </div>
            </div>

<?php
        $i++;
    }
        wp_reset_postdata();
?>
        </div>
    </div>
</div>
<!-- Blog End -->

<?php get_footer(); ?>