<?php
    /**
     * Template name: Página sin sidebar
     */
    get_header();
    while ( have_posts() ) : the_post(); 
?> 

<article>
	<header class="SiteHeader">
		<?php the_title( '<h1 class="SiteHeader-title">', '</h1>' ); ?>
	</header>
	<div class="Site-content Container">
		<main class="Main">
			<?php
				get_template_part( 'template-parts/content', 'page' );
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
            ?>
		</main>
	</div>
</article>

<?php 
	endwhile;
	get_footer(); 
?>