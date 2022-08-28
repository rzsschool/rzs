<?php
    add_action('wp_enqueue_scripts','childhood_style');
    add_action('wp_enqueue_scripts','childhood_scripts');

    function childhood_style() {
        // add ...style.css
        wp_enqueue_style('childhood-style', get_stylesheet_uri());
        
        // add ...assets/styles/main.min.css
        // wp_enqueue_style('header-style', get_template_directory_uri( ) . '/assets/styles/main.min.css');
    };

    function childhood_scripts() {
        // add ...assets/js/main.min.js array('jquery') null=залежність, true=підкючення в кінці
        wp_enqueue_script('childhood-script', get_template_directory_uri() . '/assets/js/main.min.js', array(), null, true);
    };
    // bloginfo($show:string ) 
    // bloginfo('template_url') 
    
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
?>