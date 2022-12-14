<?php
    add_action('wp_enqueue_scripts','rzs_style');
    add_action('wp_enqueue_scripts','rzs_scripts');

    function rzs_style() {
        // add ...style.css
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css');
        wp_enqueue_style('flaticon-font', get_template_directory_uri() . '/assets/lib/flaticon/flaticon.css');
        wp_enqueue_style('libraries-stylesheetp', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css');
        wp_enqueue_style('customized-bootstrap', get_template_directory_uri() . '/assets/styles/style.min.css');
        wp_enqueue_style('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
        wp_enqueue_style('rzs-style', get_stylesheet_uri());
        wp_enqueue_style('categories', get_template_directory_uri() . '/assets/styles/categories.css');
        wp_enqueue_style('menu', get_template_directory_uri() . '/assets/styles/menu.css');
        wp_enqueue_style('additional_style', get_template_directory_uri() . '/assets/styles/additional_style.css');
        // https://www.jsdelivr.com/
        wp_enqueue_style('lightgallery', 'https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lightgallery.css');
        wp_enqueue_style('lg-zoom', 'https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-zoom.css');
        wp_enqueue_style('justifiedGallery', 'https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/css/justifiedGallery.css');
        wp_enqueue_style('lg-thumbnail', 'https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-thumbnail.css');

    };

    function rzs_scripts() {
        // add ...assets/js/main.min.js array('jquery') null=залежність, true=підкючення в кінці
        wp_enqueue_script('jquery');
        wp_enqueue_script('stackpath', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array(), null, true);
        wp_enqueue_script('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);
        wp_enqueue_script('easing', get_template_directory_uri() . '/assets/lib/easing/easing.min.js', array('jquery'), null, true);
        wp_enqueue_script('owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/owl.carousel.min.js', array('jquery'), null, true);
        wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/lib/isotope/isotope.pkgd.min.js', array('jquery'), null, true);
        
        wp_enqueue_script('rzs-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);

        // https://www.jsdelivr.com/
        // wp_enqueue_script('script', 'https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/lightgallery.umd.js', array('jquery'), null, true);
        // wp_enqueue_script('script', 'https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/plugins/zoom/lg-zoom.umd.js', array('jquery'), null, true);
        // wp_enqueue_script('script', 'https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/js/jquery.justifiedGallery.js', array('jquery'), null, true);
        // wp_enqueue_script('script', 'https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/plugins/thumbnail/lg-thumbnail.umd.js', array('jquery'), null, true);

    };
    // bloginfo($show:string ) 
    // bloginfo('template_url') 
    
    // my function
    function get_format_date($date) {
        $arr = array_reverse(explode('-', explode(' ', $date)[0]));
        return join('.', $arr);
    };
    function get_surname_and_initials($full_name) {
        $arr = explode(' ', $full_name);
        if (count($arr) >= 3) {
            return $arr[0] . ' ' . mb_strimwidth($arr[1], 0, 1) . '. ' . mb_strimwidth($arr[2], 0, 1) . '. ';
        }
        return $date;
    };
    function get_preview_content($text) {
        $text = sanitize_text_field($text);
        return $text;
    }

    function get_the_tax( $post_id, $type_tax) {
        $categories = get_the_terms( $post_id, $type_tax );
        if ( ! $categories || is_wp_error( $categories ) ) {
                $categories = array();
        }

        $categories = array_values( $categories );

        foreach ( array_keys( $categories ) as $key ) {
                _make_cat_compat( $categories[ $key ] );
        }

        return apply_filters( 'get_the_categories', $categories, $post_id );
	}
    // other_staff
    function get_the_other_staff($post_id) {
        return get_the_tax($post_id, 'other_staff');
	}
    // lessons
    function get_the_lessons($post_id) {
        return get_the_tax($post_id, 'lessons');
        
	}
    function get_the_lessons_arr( $post_id = false, $return_name = true ) {
        $obj = get_the_lessons($post_id);
        $stack = array();
        foreach ($obj as $item) {
            // $word = the_field('genitive_case', $item);
            // array_push($stack, $word);
            array_push($stack, $item->name);
        }
        return $stack;
    }
    // cat_teacher
    function get_the_cat_teacher($post_id) {
        return get_the_tax($post_id, 'cat_teacher');
        
	}
    // ranks
    function get_the_ranks($post_id) {
        return get_the_tax($post_id, 'ranks');
        
	}
    function get_the_ranks_arr($post_id) {
        $obj = get_the_ranks($post_id);
        $stack = array();
        foreach ($obj as $item) {
            array_push($stack, $item->name);
        }
        return $stack;
	}
    function get_about_teacher($post) {
        $about_teacer = array();
        $cat_teacher = get_the_cat_teacher($post);
        if ($cat_teacher) {
            array_push($about_teacer, $cat_teacher[0]->name);
            // echo $cat_teacher[0]->name;
        }
        $ranks = get_the_ranks_arr($post);
        if ($ranks) {
            array_push($about_teacer, join(', ', $ranks));
        // echo join(', ', $ranks);
        }
        return  join(', ', $about_teacer);
    }
    // platform
    function get_the_platform($post_id) {
        return get_the_tax($post_id, 'platform');
        
	}
    // get id
    function get_tax_item_id($slug, $taxonomy) {
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'slug' => $slug,
            'hide_empty' => false,
        ]);
        if ($terms) {
            return $terms[0]->term_id;
        }
        return 0;
    }
    function get_tax_item_name($slug, $taxonomy) {
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'slug' => $slug,
            'hide_empty' => false,
        ]);
        if ($terms) {
            return $terms[0]->name;
        }
        return '';
    }
    
    // add_action('get_date', 'get_format_date');
    
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    // add_theme_support( 'timeline' );

    register_nav_menus(array(
        'top'         => 'головне меню',
        'bottom_left' => 'учням та батькам',
        'bottom_right' => 'публічна інформація',
    ));

    // add css class active on menu
    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
    function special_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'active';
        }
        return $classes;
    }
?>