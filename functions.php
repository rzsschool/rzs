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
        if (strlen($text) > 300) {
            $text = str_replace('\r', ' ', $text);
            return substr($text, 0, 300) . '...';
        }
        return $text;
    }
    // add_action('get_date', 'format_date');
    
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    // add_theme_support( 'timeline' );

    register_nav_menus(array(
        'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
        'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
    ));
?>