<?php
    // Agregando los estilos y scripts a la página de administracion
    if ( !function_exists( 'sninstitute_admin_scripts' ) ):
        function sninstitute_admin_scripts () {
            global $google_fonts;
            wp_register_style( 'google_fonts', $google_fonts, [], '1.0.0', 'all' );
            wp_register_style( 'admin_style', get_template_directory_uri() . '/assets/css/admin.css', ['google_fonts'], '1.0.0', 'all' );
            wp_register_script( 'admin_scripts', get_template_directory_uri() . '/assets/js/admin.js', [], '1.0.0', true );
            
            wp_enqueue_style( 'google_fonts' );
            wp_enqueue_style( 'admin_style' );
            wp_enqueue_script( 'admin_scripts' );
        }
    endif;
    add_action('admin_enqueue_scripts', 'sninstitute_admin_scripts');



    // Permite agregar algunos campos adicionales a los perfiles del usuario wordpress
    // En este caso se añadio el facebbok y twitter
    if ( !function_exists( 'sninstitute_user_contactmethods' ) ):
    function sninstitute_user_contactmethods ($data_user) {
        $data_user['facebook']=__('Facebook', 'sninstitute');
        $data_user['twitter']=__('Twitter', 'sninstitute');
        return $data_user;
    }
    endif;
    add_filter( 'user_contactmethods', 'sninstitute_user_contactmethods' );


    // Permite modificar la descripcion del foter del admin 
    // Credenciales
    if ( !function_exists( 'sninstitute_admin_footer_text' ) ):
        function sninstitute_admin_footer_text () {
            return '<i>
                Sitio creado por
                <a href="https://paulantezana.com/" target="_blank">@paulantezana</a>.
            </i>';
        }
    endif;
    add_filter( 'admin_footer_text', 'sninstitute_admin_footer_text' );


    // Permite remover algunos paneles del dashbord del usuario
    // en el admin de wordpress
    if ( !function_exists( 'sninstitute_wp_dashboard_setup' ) ):
        function sninstitute_wp_dashboard_setup () {
          //Actividad
          remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
          //De un vistazo
          remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
          // Comentarios recientes
          remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
          // Enlaces entrantes
          remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
          // Plugins
          remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
          //Publicación rápida
          remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
          // Borradores recientes
          remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
          //Noticas del blog de WordPress
          remove_meta_box('dashboard_primary', 'dashboard', 'side');
          //Otras noticias de WordPress
          remove_meta_box('dashboard_secondary', 'dashboard', 'side');
        }
      endif;
      add_action( 'wp_dashboard_setup', 'sninstitute_wp_dashboard_setup' );