<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package snwps
 */

get_header();
	while ( have_posts() ) : the_post(); 
?> 

	<article>
		<header class="SiteHeader">
			<?php the_title( '<h1 class="SiteHeader-title">', '</h1>' ); ?>
		</header>
		<div class="Site-content Site-content--sidebarRight Container">
			<main class="Main">
				<?php
					get_template_part( 'template-parts/content', 'page' );
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
			</main>
			<?php get_sidebar(); ?>
		</div>
	</article>

<?php 
	endwhile;
	get_footer(); 
?>