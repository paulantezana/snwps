<?php
    // Importando los estilos personalizados en
    // la  página LOGIN
    if ( !function_exists( 'sninstitute_login_scripts' ) ):
        function sninstitute_login_scripts () {
            wp_register_style( 'login_style', get_template_directory_uri() . '/assets/css/login.css', [], '1.0.0', 'all' );
            wp_register_script( 'login_scripts', get_template_directory_uri() . '/assets/js/login.js', [], '1.0.0', true );
            
            wp_enqueue_style( 'login_style' );
            wp_enqueue_script( 'login_scripts' );
        }
    endif;
    add_action('login_enqueue_scripts', 'sninstitute_login_scripts');


    // Cambiando la direccion url del logo de wordpress
    if ( !function_exists( 'sninstitute_login_logo_url' ) ):
        function sninstitute_login_logo_url () {
            return "https://paulantezana.com";
            // return home_url();
        }
    endif;
    add_filter('login_headerurl', 'sninstitute_login_logo_url');


    // Cambiando el tooltip del logo
    if ( !function_exists( 'sninstitute_login_logo_url_title' ) ):
        function sninstitute_login_logo_url_title () {
            return "Desarrollado por paulantezana.com";
            // return get_bloginfo('title') . ' | ' . get_bloginfo('description');
        }
    endif;
    add_filter('login_headertitle', 'sninstitute_login_logo_url_title');