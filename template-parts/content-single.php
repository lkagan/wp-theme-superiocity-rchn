<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Superiocity_RCHN
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="date-badge"><?php the_date('M j, Y') ?></div>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( has_post_thumbnail() && has_tag( array( 'rchn', 'digginin' ) ) ): ?>
			<div class="image featured-image">
				<?php the_post_thumbnail( 'large' ) ?>
			</div>
		<?php endif; ?>
		<?php if ( has_tag( 'rchn' ) ): ?>
			<?php echo do_shortcode( '[powerpress]' ); ?>
		<?php endif; ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'superiocity_rchn' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

