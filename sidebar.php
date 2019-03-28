<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package snwps
 */

if ( ! is_active_sidebar( 'main_sidebar' ) ) {
	return;
}
?>


<aside class="Sidebar">
    <?php
        if (is_active_sidebar( 'main_sidebar' )):
            dynamic_sidebar( 'main_sidebar' );
        else:
    ?>
        <article class="Widget">
            <h3><?php _e('Buscar', 'sninstitute'); ?></h3>
            <?php get_search_form( ); ?>
        </article>
    <?php
        endif;
    ?>
</aside>