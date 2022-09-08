<?php get_header(); ?>

<!-- Start End -->
<header class="container-fluid bg-primary mb-3">
    <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 400px" data-aos="fade-up" data-aos-duration="1000">
        <h3 class="display-3 font-weight-bold text-white"><?php the_title();?></h3>
        <div class="d-inline-flex text-white">
            <span><a class="text-white" href="<?php echo get_permalink( get_page_by_path( 'main' ) ); ?>">Головна</a></span>
            <span class="px-2">/</span>
            <span><?php the_title(); ?></span>
        </div>
    </div>
</header>
<!-- Header End -->


<main class="container p-3">
    <?php the_content(); ?>
</main>
<?php get_footer(); ?>