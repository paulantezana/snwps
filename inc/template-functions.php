<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package snwps
 */

if ( !function_exists( 'snwps_register_sidebars' ) ):
	function snwps_register_sidebars () {
		register_sidebar(array(
			'name' => __('Sidebar principal', 'snwps') ,
			'id' => 'main_sidebar',
			'description' => __('Este es el sidebar principal', 'snwps'),
			'before_widget' => '<article id="%1$s" class="Widget  %2$s">',
			'after_widget' => '</article>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name' => __('Sidebar inferior', 'snwps') ,
			'id' => 'footer_sidebar',
			'description' => __('Este es el sidebar de pie de página', 'snwps'),
			'before_widget' => '<article id="%1$s" class="Widget  %2$s">',
			'after_widget' => '</article>',
			'before_title' => '<h3 class="Footer-title">',
			'after_title' => '</h3>',
		));
	}
endif;
add_action('widgets_init', 'snwps_register_sidebars');


/**
 * Register Menu
 */
if ( !function_exists( 'snwps_menus' ) ):
	function snwps_menus () {
		register_nav_menus(array(
			'main_menu' => __('Menú Principal', 'snwps'),
			'footer_menu' => __('Menu inferior', 'snwps'),
		));
	}
endif;
add_action( 'init', 'snwps_menus' );


/**
 * Enqueue scripts and styles.
 */
if ( !function_exists( 'snwps_scripts' ) ):
	function snwps_scripts () {
		global $google_fonts;
		global $icon_fonts;

		wp_register_style( 'google_fonts', $google_fonts, [], '1.0.0', 'all' );
		wp_register_style( 'icon_fonts', $icon_fonts, [], '1.0.0', 'all' );

		wp_register_style( 'style', get_template_directory_uri() . '/assets/css/app.css', ['google_fonts','icon_fonts'], '1.0.0', 'all' );
		wp_register_script( 'scripts', get_template_directory_uri() . '/assets/js/app.js', [], '1.0.0', true );
		
		wp_enqueue_style( 'icon_fonts' );
		wp_enqueue_style( 'google_fonts' );
		wp_enqueue_style( 'style' );
		wp_enqueue_script( 'scripts' );
		// wp_enqueue_style( 'snwps-style', get_stylesheet_uri() ); // Los estilos actualmente no estan soportados para este tema

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;  
add_action('wp_enqueue_scripts', 'snwps_scripts');


/**
 * Establezca el ancho del contenido en píxeles, según el diseño y la hoja de estilo del tema.
 *
 * Prioridad 0 para que esté disponible para devoluciones de llamada de prioridad más baja.
 *
 * @global int $content_width Content width.
 */
function snwps_content_width() {
	// Esta variable está destinada a ser anulada desde los temas.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'snwps_content_width', 1200 );
}
add_action( 'after_setup_theme', 'snwps_content_width', 0 );


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function snwps_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'snwps_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function snwps_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'snwps_pingback_header' );



