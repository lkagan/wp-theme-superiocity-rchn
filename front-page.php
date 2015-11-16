<?php
/**
 * The template for displaying only the front page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Superiocity_RCHN
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="content-center">
			<pre>
			<?php
			$query_args = array(
				'numberposts' => 5,
				'category' => 'episodes',
				'post_status' => 'publish',
			);

			$episodes = wp_get_recent_posts( $query_args );
			//print_r( $episodes[0] );
			$pp_data = powerpress_get_enclosure_data( $episodes[0]['ID'] );
			//print_r( $pp_data );
			?>
				</pre>
			<?= $pp_data['post_title'] ?><br>

		</div>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'page' ); ?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
