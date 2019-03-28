<?php
/**
 * sninstitute functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sninstitute
 */

global $google_fonts;
global $icon_fonts;

$google_fonts = "https://fonts.googleapis.com/css?family=Lato:300,400|Open+Sans:400,600";
$icon_fonts = "https://file.myfontastic.com/BvJ9ZpkTzesj6MoByRLk3a/icons.css";

/**
 * Custom theme
 */
require get_template_directory() . '/inc/template-functions.php';

 /**
 * Theme Support
 */
require_once get_template_directory() . '/inc/support.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Login
 */
require_once get_template_directory() . '/inc/custom/login.php';

/**
 * Custom admin
 */
require_once get_template_directory() . '/inc/custom/admin.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}