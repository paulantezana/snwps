<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package snwps
 */

?>

<article class="Search">
	<header class="Search-header">
		<?php the_title( sprintf( '<h2 class="Search-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			snwps_posted_on();
			snwps_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php snwps_post_thumbnail(); ?>

	<div class="Search-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="Search-footer">
		<a href="<?php the_permalink(); ?>" title="Continuar leyendo">Continuar leyendo</a>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
