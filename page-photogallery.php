
<?php get_header(); ?>

<style>

/* .gallery-item {
    width: 200px;
    padding: 5px;
} */

</style>
<!-- Start End -->
<div class="container-fluid bg-primary mb-3">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white"><?php the_title()?></h3>
    </div>
</div>
<!-- Header End -->
  <!-- <img src="C:/xampp/htdocs/rzs/wp-content/themes/rzs/assets/img/logo.svg" alt=""> -->
<div class="header d-flex flex-column align-items-center">
</div>
<div class="container-sm">
    <div class="row justify-content-center">
        <div class="col col-md-10">
            <div class="gallery-container" id="animated-thumbnails-gallery">

<?php 
    $posts = get_posts( array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'photo_gallery',
        'suppress_filters' => true,
    ) );

    // global $post;

    foreach( $posts as $post ){
        setup_postdata( $post );
        $thumbnail = get_the_post_thumbnail_url();
        // print_r($post);
        // echo '**' . $thumbnail;
        // the_field('photo_of_gallery');

?>

                <a data-src="<?php the_field('photo_of_gallery');?>" data-sub-html="<?php echo $post->post_title;?>">
                    <img alt="photo" class="" src="<?php echo $thumbnail;?>" />
                </a>
<?php
    }
    wp_reset_postdata();
?>

                <!-- <a class="gallery-item" data-src="https://images.unsplash.com/photo-1609342122563-a43ac8917a3a?ixlib=rb-1.2.1" data-sub-html="Заголовок">
                    <img alt="layers of blue." class="img-responsive" src="https://images.unsplash.com/photo-1609342122563-a43ac8917a3a?ixlib=rb-1.2.1" />
                </a> -->
                
            </div>
        </div>
    </div>
</div>
   
<?php get_footer(); ?>

<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/lightgallery.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/plugins/zoom/lg-zoom.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/js/jquery.justifiedGallery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/plugins/thumbnail/lg-thumbnail.umd.js"></script>

<script>
    jQuery("#animated-thumbnails-gallery")
    .justifiedGallery({
        captions: false,
        lastRow: "hide",
        rowHeight: 180,
        margins: 5,

        // animateThumb: false,
        // zoomFromOrigin: false,
        // allowMediaOverlap: true,
        // toggleThumb: true,
        /* :/ */
        // animateThumb: false,
        // zoomFromOrigin: false,
        // allowMediaOverlap: true,
        // toggleThumb: true,

    })
    .on("jg.complete", function () {
        window.lightGallery(
        document.getElementById("animated-thumbnails-gallery"),
        {
            autoplayFirstVideo: false,
            pager: false,
            galleryId: "nature",
            plugins: [lgZoom, lgThumbnail],
            mobileSettings: {
                controls: false,
                showCloseIcon: false,
                download: false,
                rotate: false,
            }
        }
        );
    });

</script>