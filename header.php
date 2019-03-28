<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package snwps
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="Site" class="Site">
        <div class="Site-header">
            <header class="Header">
                <div class="Header-branding">
                    <div class="Branding">
                        <div class="Branding-logo">
                            <?php
							if (the_custom_logo()) {
								the_custom_logo();
							}
							?>
                        </div>
                        <div class="Branding-content">
                            <div class="Branding description"><?php bloginfo('name'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="Header-nav">
                    <div id="PrimaryMenu-toggle" class="icon-menu Menu-toggle"></div>
                    <div class="PrimaryMenu-container">
						<div class="icon-menu" id="PrimaryMenu-close"></div>
                        <?php
							wp_nav_menu([
								'theme_location'  => 'main_menu',
								'container'       => 'nav',
								'container_class' => 'PrimaryMenu-nav',
								'container_id' => 'PrimaryMenu-nav',
								'menu_class'      => 'Menu PrimaryMenu',
								'menu_id'        => 'PrimaryMenu',
							]);
						?>
                    </div>
                </div>
            </header>
        </div> 