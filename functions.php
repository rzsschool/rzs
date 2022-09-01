<?php
    add_action('wp_enqueue_scripts','rzs_style');
    add_action('wp_enqueue_scripts','rzs_scripts');

    function rzs_style() {
        // add ...style.css
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css');
        wp_enqueue_style('flaticon-font', get_template_directory_uri() . '/assets/lib/flaticon/flaticon.css');
        wp_enqueue_style('libraries-stylesheetp', get_template_directory_uri() . '/assets/lib/owlcarousel/assets/owl.carousel.min.css');
        wp_enqueue_style('customized-bootstrap', get_template_directory_uri() . '/assets/styles/style.min.css');
        wp_enqueue_style('rzs-style', get_stylesheet_uri());
        wp_enqueue_style('categories', get_template_directory_uri() . '/assets/styles/categories.css');
        // add ...assets/styles/main.min.css
        // wp_enqueue_style('header-style', get_template_directory_uri( ) . '/assets/styles/main.min.css');
    };

    function rzs_scripts() {
        // add ...assets/js/main.min.js array('jquery') null=залежність, true=підкючення в кінці
        // wp_enqueue_script('rzs-script', get_template_directory_uri() . '/assets/js/main.min.js', array(), null, true);
        wp_enqueue_script('jquery');
        wp_enqueue_script('stackpath', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array(), null, true);
        wp_enqueue_script('easing', get_template_directory_uri() . '/assets/lib/easing/easing.min.js', array('jquery'), null, true);
        wp_enqueue_script('owlcarousel', get_template_directory_uri() . '/assets/lib/owlcarousel/owl.carousel.min.js', array('jquery'), null, true);
        wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/lib/isotope/isotope.pkgd.min.js', array('jquery'), null, true);
        wp_enqueue_script('rzs-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
        // wp_enqueue_script('rzs-script', get_template_directory_uri() . '/assets/js/main.min.js', array(), null, true);
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
        // $text = wp_strip_all_tags($text);
        // $text = strip_tags($text);
        // $text = wp_filter_nohtml_kses($text);

        // if (strlen($text) > 300) {
        //     $text = str_replace('\r', ' ', $text);
        //     return substr($text, 0, 300) . '...';
        // }
        return $text;
    }
    // LESSONS
    // function get_lessons( $args = '' ) {
    //     $defaults = array( 'taxonomy' => 'lessons' );
    //     $args     = wp_parse_args( $args, $defaults );
    //     $args['taxonomy'] = apply_filters( 'get_categories_taxonomy', $args['taxonomy'], $args );
    //     if ( isset( $args['type'] ) && 'link' === $args['type'] ) {
    //     _deprecated_argument(
    //         __FUNCTION__,
    //         '3.0.0',
    //         sprintf(
    //         __( '%1$s is deprecated. Use %2$s instead.' ),
    //     	    '<code>type => link</code>',
    //     	    '<code>taxonomy => link_category</code>'
    //     	)
    //     );
    //     $args['taxonomy'] = 'link_category';
    //     }
        	
    //     $categories = get_terms( $args );
        	
    //     if ( is_wp_error( $categories ) ) {
    //     	                $categories = array();
    //     } else {
    //         $categories = (array) $categories;
    //     	foreach ( array_keys( $categories ) as $k ) {
    //     	    _make_cat_compat( $categories[ $k ] );
    //     	}
    //     }
        	
    //     return $categories;
    // }

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
        'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
        'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
    ));
?>