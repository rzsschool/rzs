<?php get_header(); ?>

<!-- Start End -->
<div class="container-fluid bg-primary mb-3">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white"><?php the_title()?></h3>
    </div>
</div>
<!-- Header End -->


<div class="container p-3">
    <?php the_content(); ?>
</div>
<?php get_footer(); ?>