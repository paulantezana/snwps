<?php
    // Add suport custom logo
    if ( !function_exists( 'snwps_setup' ) ):
        /**
         * Sets up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support for post thumbnails.
        */
        function snwps_setup() {
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             * If you're building a theme based on snwps, use a find and replace
             * to change 'snwps' to the name of your theme in all the template files.
            */
            load_theme_textdomain( 'snwps', get_template_directory() . '/languages' );

            // Añadiendo soporte a los imagenes de poster
            add_theme_support( 'post-thumbnails' );
            
            // Añadiendo soporte alo widhet editable
            add_theme_support( 'customize-selective-refresh-widgets' );

            // Soporte de logo personalizable
            add_theme_support( 'custom-logo', array(
                'height'      => 100,
                'width'       => 400,
                'flex-height' => true,
                'flex-width'  => true,
                // 'header-text' => array( 'site-title', 'site-description' ),
            ));

            // Soporte HTML5
            add_theme_support('html5',[
                'comment-list',
                'comment-form',
                'search-form',
                'gallery',
                'caption'
            ]);

            /*
             * Let WordPress manage the document title.
             * By adding theme support, we declare that this theme does not use a
             * hard-coded <title> tag in the document head, and expect WordPress to
             * provide it for us.
            */
            add_theme_support( 'title-tag' );

            //Activar Feeds RSS
            add_theme_support( 'automatic-feed-links' );

            // Añadir soporte para los estilos de bloque. EN EL EDITOR
            add_theme_support( 'wp-block-styles' );

            // Añadir soporte para alinear imágenes completas y anchas. EN EL EDITOR
            add_theme_support( 'align-wide' );

            // Añadir soporte para estilos de editor. EN EL EDITOR
            add_theme_support( 'editor-styles' );

            // Agregue soporte para contenido integrado responsivo.
		    add_theme_support( 'responsive-embeds' );

            // Llamando a los estilos css del editor EN EL EDITOR
		    add_editor_style( 'assets/dist/editor.css' );

            //Ocultar Tags innecesarios del head
            //Versión de WordPress
            remove_action('wp_head', 'wp_generator');

            //Imprime sugerencias de recursos para los navegadores para precargar, pre-renderizar y pre-conectarse a sitios web
            remove_action('wp_head', 'wp_resource_hints', 2);
            //Muestre el enlace al punto final del servicio Really Simple Discovery
            remove_action('wp_head', 'rsd_link');
            //Muestre el enlace al archivo de manifiesto de Windows Live Writer
            remove_action('wp_head', 'wlwmanifest_link');
            //Inyecta rel = shortlink en el encabezado si se define un shortlink para la página actual.
            // remove_action('wp_head', 'wp_shortlink_wp_head');
            //Quitar scripts para soporte a emojis
            //remove_action('wp_print_styles', 'print_emoji_styles');
            //remove_action('wp_head', 'print_emoji_detection_script', 7);
            //Quitar la barra de administración en el Frontend
            // add_filter('show_admin_bar', '__return_false');
        }
    endif;
    add_action( 'after_setup_theme', 'snwps_setup' );