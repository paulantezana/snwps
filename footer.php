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
                <div class="FooterItem">
                    <?php dynamic_sidebar('footer_sidebar'); ?>
                </div>
            </div>
        </div>
    </div><!-- #Site -->
    <?php wp_footer(); ?>
    </body>
</html>