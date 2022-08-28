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
    
    add_theme_support('custom-logo');
    // add_theme_support('post-thumbnails');
    // add_theme_support('menus');
?>