<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package snwps
 */

?>

		<div class="Site-footer">
            <div class="Footer Container">
                <div class="Footer-item Footer-social">
                    <?php
                        if (the_custom_logo()) {
                            the_custom_logo();
                        }
                    ?>
                    <ul class="SocialIcons">
                        <li><a href="<?php echo get_theme_mod('sninstitute_facebook');?>" class="icon-facebook sninstitute-facebook" target="_blanck"></a></li>
                        <li><a href="<?php echo get_theme_mod('sninstitute_youtube');?>" class="icon-youtube sninstitute-youtube" target="_blanck"></a></li>
                        <li><a href="<?php echo get_theme_mod('sninstitute_twitter');?>" class="icon-twitter sninstitute-twitter" target="_blanck"></a></li>
                        <li><a href="<?php echo get_theme_mod('sninstitute_email');?>" class="icon-email sninstitute-email" target="_blanck"></a></li>
                    </ul>
                    <p><?= get_bloginfo("name") ?></p>
                </div>
                <div class="Footer-item Footer-menu">
                    <h4 class="Footer-title">Acerca de la empresa</h4>
                    <?php
                        if ( has_nav_menu( 'footer_menu' ) ):
                            wp_nav_menu([
                                'theme_location' => 'footer_menu',
                                'container' => 'nav',
                                'container_class' => 'socialMedia',
                                'link_before' => '<span class="sr-text">',
                                'link_after' => '</span>'
                            ]);
                        endif;
                    ?>
                </div>
                <div class="Footer-item Footer-sidebar">
                    <?php dynamic_sidebar('footer_sidebar'); ?>
                </div>
            </div>
        </div>
    </div><!-- #Site -->
    <?php wp_footer(); ?>
    </body>
</html>