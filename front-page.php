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
		<div class="row sponsor">

		</div>
		<div class="row">
			<div class="container-center">
				<div class="citizen content-box">
					<h4>Become a Citizen</h4>
				</div>
				<div class="rchn-gear content-box">
					<h4>Buy Awesome RCHN Gear</h4>
				</div>
				<div class="newsletter content-box">
					<h4>Subscribe to the Newsletter</h4>
				</div>
				<div class="episodes content-box">
					<h4>Latest Episodes</h4>
					<ul>
						<?php
						$pp_data = powerpress_get_enclosure_data( $episodes[0]['ID'] );
						//print_r( $pp_data );

						$query_args = array (
							'posts_per_page' => 5,
							'category'       => 'episodes',
							'post_status'    => 'publish',
						);

						$episodesQuery = new WP_Query( $query_args );

						while( $episodesQuery->have_posts() ): $episodesQuery->the_post(); ?>
							<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a><br> <?php the_date(); ?> </li>
						<?php endwhile; ?>
					</ul>
				</div> <!-- .episodes -->
			</div> <!-- .container-center -->
		</div> <!-- .row -->
		<div class="row">
			<div class="container-center">
				<div class="reviews content-box">
					<h4>Latest Reviews</h4>
				</div> <!-- .reviews -->
				<div class="tech-tips content-box">
					<h4>Latest Tech Tips</h4>
				</div> <!-- .tech-tips -->
				<div class="events content-box">
					<h4>Upcoming Events</h4>
				</div> <!-- .events -->
				<div class="videos content-box">
					<h4>Latest Videos</h4>
				</div> <!-- .events -->
			</div> <!-- .container-center -->
		</div> <!-- .row -->
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'page' ); ?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
