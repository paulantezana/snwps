<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package snwps
 */

get_header();
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); 
?> 

			<article>
				<header class="SiteHeader">
					<?php the_title( '<h1 class="SiteHeader-title">', '</h1>' ); ?>
				</header>
				<div class="Site-content Site-content--sidebarRight Container">
					<main class="Main">
						<?php
							get_template_part( 'template-parts/content', 'search' );
						?>
					</main>
					<?php get_sidebar(); ?>
				</div>
			</article>

<?php 
		endwhile;
		// the_posts_navigation();
	else:
?>
			<article>
				<header class="SiteHeader">
					<h1 class="SiteHeader-title"><?php _e( 'No se encontró ningún resultado', 'sninstitute' ); ?></h1>
				</header>
				<div class="Site-content Site-content--sidebarRight Container">
					<main class="Main">
						<?php
							get_template_part( 'template-parts/content/content', 'none' );
						?>
					</main>
					<?php get_sidebar(); ?>
				</div>
			</article>
<?php
	endif;
	get_footer(); 
?>

