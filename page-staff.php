<?php get_header(); ?>
<?php //print_r( $_GET); ?>
<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px" data-aos="fade-up" >
        <h3 class="display-3 font-weight-bold text-white">Наш колектив</h3>
        <div class="d-inline-flex text-white">
            <span><a class="text-white" href="<?php echo get_permalink( get_page_by_path( 'main' ) ); ?>">Головна</a></span>
            <span class="px-2">/</span>
            <span><a class="text-white" href="<?php echo get_permalink( get_page_by_path( 'staff' ) ); ?>">Наш колектив</a></span>
<?php 
    $is_cat = array_key_exists('cat', $_GET); 
    $is_lesson = array_key_exists('lesson', $_GET); 
    $is_cat_teacher = array_key_exists('cat_teacher', $_GET);
    global $cat_name;
    if ($is_cat) {
?>
            <span class="px-2">/</span>
<?php 
        if ($_GET['cat'] == 'administration') {
            $cat_name = 'Адміністрація';
            echo '<span>Адміністрація</span>';
        } elseif ($_GET['cat'] == 'teacher') {
            $cat_name = 'Вчителі';
            echo '<span>Вчителі</span>';
        } else {
            $cat_name = get_tax_item_name($_GET['cat'], 'other_staff');
            echo '<span>' . $cat_name . '</span>';
        }
    } elseif ($is_lesson) {
        echo '<span class="px-2">=></span>';
        echo '<span>' . get_tax_item_name($_GET['lesson'], 'lessons') . '</span>';
    } elseif ($is_cat_teacher) {
        echo '<span class="px-2">=></span>';
        echo '<span>' . get_tax_item_name($_GET['cat_teacher'], 'cat_teacher') . '</span>';
}
?>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Team Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2" data-aos="fade-down" >
            <p class="section-title px-5"><span class="px-2">Наша команда</span></p>
            <h1 class="mb-4">Зустрічай нашу команду</h1>
        </div>


        <div class="row">
            <div class="col-12 text-center mb-2">
                <div class="list-inline mb-4" id="portfolio-flters">
<?php 
    $class_first_link = 'category_link_active';
    if ($is_lesson or $is_cat_teacher) {
        $class_first_link = '';
    }
?>
                    <a class="btn category_link m-1 <?php echo $class_first_link; ?>" href="<?php echo get_permalink( get_page_by_path( 'staff' ) ); ?>">Всі</a>
                    <a class="btn category_link m-1" href="<?php echo get_permalink( get_page_by_path( 'staff' ) ); ?>?cat=administration">Адміністрація</a>
                    <a class="btn category_link m-1" href="<?php echo get_permalink( get_page_by_path( 'staff' ) ); ?>?cat=teacher">Вчителі</a>
<?php
    $other_staff = get_categories('taxonomy=other_staff&type=custom_post_type');
    foreach ($other_staff as $other_person) {
?>
    <a class="btn category_link m-1" href="<?php echo get_permalink( get_page_by_path( 'staff' ) ); ?>?cat=<?php echo $other_person->slug; ?>"><?php echo $other_person->name; ?></a>
<?php
    }         
?>
                </div>
            </div>
        </div>

        <main class="row">
<?php 
    // print_r($_GET);
    // echo $_GET['cat'];
    if ($is_cat) {
        if ($_GET['cat'] == 'administration')
        {
            $staff = get_posts( array(
                'numberposts'   => -1,
                'orderby'     => 'title',
                'order'       => 'ASC',
                'meta_key'		=> 'is_administration',
                'meta_value'	=> true,
                'post_type'     => 'person',
                'suppress_filters' => true,
            ) );
        } elseif ($_GET['cat'] == 'teacher') {
            $staff = get_posts( array(
                'numberposts'   => -1,
                'orderby'     => 'title',
                'order'       => 'ASC',
                'meta_key'		=> 'is_teacher',
                'meta_value'	=> true,
                'post_type'     => 'person',
                'suppress_filters' => true,
            ) );
        } else {
        // term_id, name, or slug -
           $staff = get_posts( array(
                'numberposts'   => -1,
                'post_type'     => 'person',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'other_staff',
                        'field' => 'slug',
                        'terms' => $_GET['cat'],
                    )
                )
            ) );
        }
    } elseif ($is_lesson) {
        $staff = get_posts( array(
            'numberposts'   => -1,
            'post_type'     => 'person',
            'tax_query' => array(
                array(
                    'taxonomy' => 'lessons',
                    'field' => 'slug',
                    'terms' => $_GET['lesson'],
                )
            )
        ) ); 
    } elseif ($is_cat_teacher) {
        $staff = get_posts( array(
            'numberposts'   => -1,
            'post_type'     => 'person',
            'tax_query' => array(
                array(
                    'taxonomy' => 'cat_teacher',
                    'field' => 'slug',
                    'terms' => $_GET['cat_teacher'],
                )
            )
        ) ); 
    } else {
        $staff = get_posts( array(
            'numberposts'   => -1,
            'orderby'     => 'title',
            'order'       => 'ASC',
            'meta_key'		=> 'is_working',
            'meta_value'	=> true,
            'post_type'     => 'person',
            'suppress_filters' => true,
        ) );
    }
    $i = 0;
    foreach( $staff as $person ){
        setup_postdata( $person );
        // print_r($person);
        $fields = get_fields($person);
        if (!$fields['is_working']) {
            continue;
        }
?>
            <article class="col-md-6 col-lg-3 text-center team mb-5" 
                data-aos="zoom-in"
                data-aos-duration="<?php echo 200 + 100 * ($i % 4 + 1); ?>">
                <a href="<?php echo $person->guid ?>">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="<?php echo $fields['photo']; ?>" alt="person_photo">
                    </div>
                    <h4><?php echo $person->post_title; ?></h4>
                </a>
<?php
        if ($fields['is_administration']) {
?>
                <i><?php echo $fields['position'] ?></i><br>
<?php
        }
        $professions = get_the_other_staff($person);
        foreach ($professions as $profession) {
            echo '<i>' . $profession->name . '</i><br>';
        }
        if ($fields['is_teacher']) {
                ?><i><?php
            if ($fields['sex']=='чоловіча') {
                ?>Вчитель <?php 
            } else {
                ?>Вчителька <?php
            }
            $lessons = get_the_lessons_arr($person);
            echo join(', ', $lessons);
                ?></i><br><?php
            }
?>
            </article>
<?php
        $i++;
    }
    wp_reset_postdata();
?>

        </main>
    </div>
</div>
<!-- Team End -->

<?php get_footer(); ?>
<script>
    window.onload=function(e){
        
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