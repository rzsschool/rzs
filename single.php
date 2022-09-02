<?php get_header(); ?>

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Сторінка Новини</h3>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Blog Detail</p>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Detail Start -->
<div class="container pb-5">
    <div class="row pt-5">
        <div class="col-lg-8">
            <div class="d-flex flex-column text-left mb-3">
                <p class="section-title pr-5"><span class="pr-2">Сторінка новини</span></p>

                <h1 class="mb-3"><?php the_title() ?></h1>
                <div class="d-sm-flex">
                    <p class="mr-3">
                        <i class="fa fa-user text-primary"></i>
                        <?php $author = get_field('author') ; ?>
                        <?php echo get_surname_and_initials($author->post_title) ; ?>
                    </p>
<?php $category = get_the_category($post->ID)[0]; ?>
                    <p class="mr-3"><i class="fa fa-folder text-primary"></i> <?php echo $category->name; ?></p>
                    <p class="mr-3"><i class="fa fa-calendar-day text-primary"></i> <?php echo get_format_date($post->post_date); ?></p>
                </div>
            </div>
            <div class="mb-5">
<?php
                $thumbnail = get_the_post_thumbnail_url();
                if ($thumbnail) {
?>
                <img class="img-fluid rounded w-100 mb-4" src="<?php echo $thumbnail ?>" alt="Image">

<?php
                }
?>
                <?php the_content(); ?>

        </div>
<!-- Related Post -->
            
<?php
$related_posts = get_posts( array(
        'numberposts' => 4,
        'category'    => $category->term_id,
        'orderby'     => 'date',
        'order'       => 'ASC',
        'post_type'   => 'post',
        'suppress_filters' => true,
    ) );
    global $related_post;
    
    if (count($related_posts) > 1) {
?>
        <div class="mb-5 mx-n3">
            <h2 class="mb-4 ml-3">Схожі новини</h2>
            <div class="owl-carousel post-carousel position-relative">

<?php 
        foreach( $related_posts as $related_post ){
            setup_postdata( $related_post );
            if ($related_post->ID == $post->ID) {
                continue;
            }
            
            // print_r($related_post);
?>
            <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3">

<?php 
            $thumbnail = get_the_post_thumbnail_url($related_post);
            $category = get_the_category($related_post->ID);
            if ($thumbnail) {
?>
                <img class="img-fluid" src="<?php echo $thumbnail ?>" style="width: 80px; height: 80px;" alt="post_img">
<?php
            } else {
                $image = get_field('image', $category[0]);
?>
                <img class="img-fluid" src="<?php echo $image ?>" style="width: 80px; height: 80px;" alt="post_img">
<?php
            }
?>
                <div class="pl-3">

                    <h5>
                        <a href="<?php the_permalink($related_post); ?>" class="text-dark">
                            <?php echo $related_post->post_title; ?>
                        </a>
                    </h5>
                    <div>
                        <small class="mr-3">
                            <i class="fa fa-user text-primary"></i>
                            <?php $author_related_post = get_field('author', $related_post) ; ?>
                            <?php echo get_surname_and_initials($author_related_post->post_title) ; ?>
                        </small>
                        <br>
                        <small class="mr-3">
                            <i class="fa fa-folder text-primary"></i>
                            <?php echo get_format_date($related_post->post_date); ?>
                        </small>
                    </div>
                </div>
            </div>
<?php
        }
?>
        </div>
    </div>
<?php        
        wp_reset_postdata();
    }
?>

</div>

<div class="col-lg-4 mt-5 mt-lg-0">
    <!-- Author Bio -->
    <div class="d-flex flex-column text-center bg-primary rounded mb-5 py-5 px-4">
        <?php $fields = get_fields($author) ?>
        <img src="<?php echo $fields['photo'] ?>" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px;" alt="author">

        <h3 class="text-secondary mb-3">
            <a href="<?php echo get_permalink($author); ?>" class="text-white">
                <?php echo get_surname_and_initials($author->post_title); ?>
            </a>
        </h3>
<?php
            if ($fields['life_credo']) { 
?>
        <p class="text-white m-0"><?php echo $fields['life_credo']; ?></p>
<?php
            }
?>
    </div>

            <!-- Keyword -->
<!--            <div class="mb-5">-->
<!--                <form action="">-->
<!--                    <div class="input-group">-->
<!--                        <input type="text" class="form-control form-control-lg" placeholder="Keyword">-->
<!--                        <div class="input-group-append">-->
<!--                            <span class="input-group-text bg-transparent text-primary"><i-->
<!--                                    class="fa fa-search"></i></span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->

            <!-- Category List -->
            <div class="mb-5">
                <h2 class="mb-4">Категорії</h2>
                <ul class="list-group list-group-flush">
<?php
                $categories = get_categories();
                global $cat_item;
                foreach( $categories as $cat_item ){
?>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <!-- ** -->
                        <a href="<?php echo get_permalink( get_page_by_path( 'news' ) ); ?>?cat=<?php echo $cat_item->slug ?>"><?php echo $cat_item->name ?></a>
                        <span class="badge badge-primary badge-pill"><?php echo $cat_item->category_count ?></span>
                    </li>
<?php
                }
?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Detail End -->

<?php get_footer(); ?>
