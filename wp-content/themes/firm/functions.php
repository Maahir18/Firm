<?php

    function register_nav(){
        register_nav_menus(
            array(
                'header'=>'Header'
            )
        );

        register_nav_menus(
            array(
                'footer'=>'Footer'
            )
        );

        register_nav_menus(
            array(
                '404'=>'404'
            )
        );
    }

    if(!function_exists('setup')):
        function setup(){
            register_nav();
            add_theme_support('post-thumbnails');
            add_image_size('team', 475, 475, array('center','center'));

        }
    endif;

    function scripts_header(){
        wp_enqueue_style('init', get_stylesheet_uri());
        wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
        wp_enqueue_style('carousel-style', get_template_directory_uri().'/css/carousel-style.css', array(), '1.0.0', 'all');
    }

    function scripts_footer(){
        wp_deregister_script('jquery');
	    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), null, false);
        wp_enqueue_script('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), null, true);
    }

    add_action('after theme setup','setup');
    add_action('wp_enqueue_scripts','scripts_header');
    add_action('wp_footer','scripts_footer');