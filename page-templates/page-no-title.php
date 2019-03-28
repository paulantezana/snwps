<?php
    /**
     * Template name: Ancho completo sin sidebar sin titulo
     */
    get_header();
    while ( have_posts() ) : the_post(); 
?> 

<article>
	<div class="Site-content">
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