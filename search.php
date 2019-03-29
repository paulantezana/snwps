<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package snwps
 */
get_header();?> 

	<article>
		<header class="SiteHeader">
			<h1 class="SiteHeader-title">Resultados de la búsqueda para: <?= get_search_query()?></h1>
		</header>
		<div class="Site-content Site-content--sidebarRight Container">
			<main class="Main">
				<?php
					while ( have_posts() ) : the_post(); 
						get_template_part( 'template-parts/content', 'search' );
						// // If comments are open or we have at least one comment, load up the comment template.
						// if ( comments_open() || get_comments_number() ) :
						// 	comments_template();
						// endif;
					endwhile;
				?>
			</main>
			<?php get_sidebar(); ?>
		</div>
	</article>

<?php 
	
	get_footer(); 
?>