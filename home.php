<?php get_header(); ?>
<?php 
    // VAR
    $is_cat = array_key_exists('cat', $_GET);
    $cat_name = '';
    $categories = get_categories();
    $count_posts = 0;
    if ($is_cat) {
        $cat_name = get_tax_item_name($_GET['cat'], 'category');
        $_tmp = $_GET['cat'];
        // finding count post of category
        foreach ($categories as $category) {
            if ($category->slug == $_tmp) {
                $count_posts = $category->count;
                break;
            } 
        }
    } else {
        $count_posts = wp_count_posts('post')->publish;
    }

    $posts_per_page = 9; // MAIN CONST 
    $page_now = 0;
    $offset = 0;
    if (array_key_exists('page_now', $_GET)) {
        $page_now = intval($_GET['page_now']);
        $offset = $posts_per_page * $page_now;
    }
    $host;
    if ($is_cat) {
        $host = get_permalink( get_page_by_path( 'news' ) ) . '?cat=' . $_GET['cat'] .'&page_now=';
    } else {
        $host = get_permalink( get_page_by_path( 'news' ) ) . '?page_now=';
    }
    
?>
<!-- Header Start -->
<header class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Наші новини</h3>
        <div class="d-inline-flex text-white">
            <span><a class="text-white" href="<?php echo get_permalink( get_page_by_path( 'main' ) ); ?>">Головна</a></span>
            <span class="px-2">/</span>
            <span><a class="text-white" href="<?php echo get_permalink( get_page_by_path( 'news' ) ); ?>">Наші новини</a></span>
<?php
    if ($is_cat) {
?>
            <span class="px-2">/</span>
            <span><?php echo $cat_name; ?>
        </span>
<?php
    }
?>
        </div>
    </div>
</header>
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
    
    // print_r($post);
    global $cat_item;
    foreach( $categories as $cat_item ){
?>
                    <a class="btn category_link m-1" href="<?php echo get_permalink( get_page_by_path( 'news' ) ); ?>?cat=<?php echo $cat_item->slug; ?>"><?php echo $cat_item->name; ?></a>
                  
<?php
    }
?>
                </div>
            </div>
        </div>
        <!--Categories End-->

        <!-- Blog Start -->
        <main class="container-fluid pt-5">
            <div class="container">
                <div class="text-center pb-2">
                    <p class="section-title px-5"><span class="px-2">Наш блог</span></p>
                    <h1 class="mb-4">Останні новини</h1>
                </div>
                <div class="row pb-3">
<?php 
        if ($is_cat) {
            // $cat_id = 
            $posts = get_posts( array(
                'posts_per_page'   => $posts_per_page,
                'offset'           => $offset,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'category'    => get_tax_item_id($_GET['cat'], 'category'),
                'post_type'   => 'post',
                'suppress_filters' => true,
            ) );
        } else {
            $posts = get_posts( array(
                'posts_per_page'   => $posts_per_page,
                'offset'           => $offset,
                'orderby'          => 'date',
                'order'            => 'DESC',
                'post_type'        => 'post',
                'suppress_filters' => true,
            ) );
        }
            
            global $post;

            foreach( $posts as $post ){
                setup_postdata( $post );
                // print_r($post);
                $fields = get_fields($post);
?>
                    <article class="col-lg-4 mb-4">
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
                    </article>

<?php
            }
                wp_reset_postdata();
?>
                </div>
            </div>
        </main>
        <!-- Blog End -->


        <div class="col-md-12 mb-4">
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center mb-0" id="paginator">
              </ul>
            </nav>
        </div>
    </div>
</div>
<!-- Blog End -->
<?php get_footer(); ?>
<script>
    window.onload=function(e){
        let countPosts = <?php echo $count_posts; ?>;
        let postsPerPage = <?php echo $posts_per_page; ?>;
        let countPages = Math.ceil(countPosts / postsPerPage);//floor
        let offset = <?php echo $offset; ?>;
        let pageNow = <?php echo $page_now; ?> + 1;
        let paginator = document.getElementById('paginator');

        let host = '<?php echo $host; ?>';
        function getListOfPages(activeN, endN) {
            if (activeN > endN) {
                activeN = endN;
                console.log(activeN);
            }
            let arr = []
            if (activeN <= 5){
                for (let n = 1 ; n < activeN; n++) {
                    arr.push(n);
                }
            } else {
                arr.push(1, 2, 0, activeN - 2, activeN - 1);
            }

            if (activeN + 5 >= endN) {
                for (let n = activeN; n < endN + 1; n++) {
                    arr.push(n);
                }
            } else {
                arr.push(activeN, activeN + 1, activeN + 2, 0, endN - 1, endN);
            }
            return arr;
        }
        
        let arr = getListOfPages(pageNow, countPages);
        function getElemWraperPagination(is_last=false) {
            let elemListItem = document.createElement('li');
            elemListItem.classList.add('page-item');
            
            let elemLink = document.createElement('a');
            elemLink.classList.add('page-link');
            
            if (is_last) {
                elemLink.href = host + (pageNow);
                elemLink.innerHTML = `
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
                `;
                if (arr[arr.length - 1] == pageNow) {
                    elemListItem.classList.add('disabled');
                }
            } else {
                elemLink.href = host + (pageNow - 2);
                elemLink.innerHTML = `
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
                `;
                if (pageNow == 1) {
                    elemListItem.classList.add('disabled');
                }
            }
            
            elemListItem.appendChild(elemLink);
            return elemListItem;
        }
        paginator.appendChild(getElemWraperPagination());
        
        for (let i = 0; i < arr.length; i++) {
            let n = arr[i];
            let elemListItem = document.createElement('li');
            elemListItem.classList.add('page-item');
            if (n == 0) {
                elemListItem.classList.add('page-link');
                elemListItem.textContent = "...";
            } else {
                if (pageNow == n) {
                    elemListItem.classList.add('active');
                }
                let elemLink = document.createElement('a');
                elemLink.classList.add('page-link');
                elemLink.href = host + (n - 1);
                elemLink.textContent = n;

                elemListItem.appendChild(elemLink);
            }
            paginator.appendChild(elemListItem);
        }
        paginator.appendChild(getElemWraperPagination(true));

        let active_category = '<?php echo $cat_name ?>';
        console.log(active_category);
        let children_cat = document.getElementById('portfolio-flters').children;
        for (let i = 1; i < children_cat.length; i++) {
            if (children_cat[i].text == active_category) {
                children_cat[i].classList.toggle('category_link_active');
                children_cat[0].classList.toggle('category_link_active');
                break;
        }
    }
}
</script>