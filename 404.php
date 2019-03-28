<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package snwps
 */

get_header(); ?>
<div class="Site-content Container">
    <main class="Main Exception404">
        <div class="Exception404-img">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/404.svg' ); ?>" alt="error">
        </div>
        <div class="Exception404-content">
            <h1>
                <span style="display: block">Oops!</span>
                This page cannot be found.
            </h1>
            <p>
                We apologize for the inconvenience, unfortunately this page is unavailable, was renamed or no longer exists. But don’t worry, we can help get you right back on track!
            </p>
            <a href="<?= get_home_url() ?>" class="Button">Ir al home</a>
        </div>
    </main>
</div>
<?php get_footer(); ?>