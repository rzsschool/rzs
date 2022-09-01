<?php get_header(); ?>

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Наші новини</h3>
        <div class="d-inline-flex text-white">
            <span><a class="text-white" href="<?php echo get_permalink( get_page_by_path( 'main' ) ); ?>">Головна</a></span>
            <span class="px-2">/</span>
            <span><a class="text-white" href="<?php echo get_permalink( get_page_by_path( 'news' ) ); ?>">Наші новини</a></span>
<?php
    if (array_key_exists('cat', $_GET)) {
?>
            <span class="px-2">/</span>
            <span><?php echo $_GET['cat']; ?></span>
<?php
    }
?>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Blog Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5"><span class="px-2">Останні новини</span></p>
            <h1 class="mb-4">Останні новини нашого блогу</h1>
        </div>

        <!--Categories Start-->
        <div class="row">
            <div class="col-12 text-center mb-2">
                <div class="list-inline mb-4" id="portfolio-flters">
                    <a class="btn category_link m-1 category_link_active" href="<?php echo get_permalink( get_page_by_path( 'news' ) ); ?>">Всі</a>
<?php
    $categories = get_categories();
    // print_r($post);
    global $cat_item;
    foreach( $categories as $cat_item ){
?>
                    <a class="btn category_link m-1" href="<?php echo get_permalink( get_page_by_path( 'news' ) ); ?>?cat=<?php echo $cat_item->name ?>"><?php echo $cat_item->name ?></a>
                  
<?php
    }
?>
                </div>
            </div>
        </div>
        <!--Categories End-->

        <!-- Blog Start -->
        <div class="container-fluid pt-5">
            <div class="container">
                <div class="text-center pb-2">
                    <p class="section-title px-5"><span class="px-2">Наш блог</span></p>
                    <h1 class="mb-4">Останні новини</h1>
                </div>
                <div class="row pb-3">
        <?php 

        if (array_key_exists('cat', $_GET)) {
            $cat_id = 
            $posts = get_posts( array(
                'numberposts' => -1,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'category'    => get_tax_item_id($_GET, 'category'),
                'post_type'   => 'post',
                'suppress_filters' => true,
            ) );
        } else {
            $posts = get_posts( array(
                'numberposts' => -1,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'post_type'   => 'post',
                'suppress_filters' => true,
            ) );
        }
            
            global $post;

            foreach( $posts as $post ){
                setup_postdata( $post );
                // print_r($post);
                $fields = get_fields($post);
        ?>
                    <div class="col-lg-4 mb-4">
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
            }
                wp_reset_postdata();
        ?>
                </div>
            </div>
        </div>
        <!-- Blog End -->


        <div class="col-md-12 mb-4">
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center mb-0">
                  <li class="page-item {{ class_first_page }}">
                      <a class="page-link" href="{% url 'blog' %}?page={{ previous_link }}&cat={{ active_category }}" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                          <span class="sr-only">Previous</span>
                      </a>
                  </li>
                  {% for n in list_of_pages %}
                  {% if n == page_number%}
                  <li class="page-item active"><a class="page-link" href="{% url 'blog' %}?page={{ n }}&cat={{ active_category }}">{{ n }}</a></li>
                  {% elif n == 0 %}
                  <li class="page-item page-link">...</li>
                  {% else %}
                  <li class="page-item"><a class="page-link" href="{% url 'blog' %}?page={{ n }}&cat={{ active_category }}">{{ n }}</a></li>
                  {% endif %}

                  {% endfor %}
                  <li class="page-item {{ class_last_page }}">
                      <a class="page-link" href="{% url 'blog' %}?page={{ next_link }}&cat={{ active_category }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                  </li>
              </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Blog End -->
{% endblock %}

{% block script %}
    let active_category = '{{ active_category }}';
    let children_cat = document.getElementById('portfolio-flters').children;
    for (let i = 1; i < children_cat.length; i++) {
        if (children_cat[i].text == active_category) {
            children_cat[i].classList.toggle('category_link_active');
            children_cat[0].classList.toggle('category_link_active');
            break;
        }
    }
{% endblock %}

<?php get_footer(); ?>