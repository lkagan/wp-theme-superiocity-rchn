<?php
/**
 * The template for displaying only the front page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Superiocity_RCHN
 */

get_header(); ?>
<?php if ( ! wp_is_mobile() ): ?>
<style>
	.home .row { background-attachment: fixed;}
</style>
<?php endif; ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="row sponsor">
			<?php if (function_exists('vslider')) { vslider('homepage1a'); }?>
			<?php if (function_exists('vslider')) { vslider('homepage1b'); }?>
		</div>
		<div class="row">
			<div class="container-center">
				<div class="citizen content-box">
					<div class="content-inner">
						<h4>Become a Registered Citizen</h4>
						<br>
						<div>
							<a href="/rchn-citizen-registration/"><img src="<?= get_stylesheet_directory_uri() ?>/images/citizen-card.png" width="276" height="173" alt="RC Heli Nation Citizen Registration"></a>
							<br>
							<br>
							<ul>
								<li>Personalized membership card with a unique Citizen number.</li>
								<li>Exclusive prizes for citizens only.</li>
								<li>20% off RCHN apparel by showing your membership card at a fun fly.</li>
								<li>Much more!</li>
							</ul>
							<a href="/rchn-citizen-registration/" class="button solid">Join Now!</a>
						</div>
					</div> <!-- .content-inner -->
				</div>
				<div class="rchn-gear content-box">
					<div class="content-inner">
						<h4>Buy Awesome RCHN Gear</h4>
					</div> <!-- .content-inner -->
				</div>
				<div class="newsletter content-box">
					<div class="content-inner">
						<h4>Subscribe to the Newsletter</h4>
					</div> <!-- .content-inner -->
				</div>
				<div class="episodes content-box">
					<div class="content-inner">
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
								<li><a href="<?php the_permalink() ?>"><?= str_replace( 'RCHN V 2.0 ', '',  the_title( null, null, false ) ); ?></a> <span class="date"><?php the_date( 'm/d/y' ); ?></span> </li>
							<?php endwhile; ?>
						</ul>
					</div> <!-- .content-inner -->
				</div> <!-- .episodes -->
			</div> <!-- .container-center -->
		</div> <!-- .row -->
		<div class="row sponsor">
			<?php if (function_exists('vslider')) { vslider('homepage2a'); }?>
			<?php if (function_exists('vslider')) { vslider('homepage2b'); }?>
		</div>
		<div class="row">
			<div class="container-center">
				<div class="reviews content-box">
					<div class="content-inner">
						<h4>Latest Reviews</h4>
					</div> <!-- .content-inner -->
				</div> <!-- .reviews -->
				<div class="tech-tips content-box">
					<div class="content-inner">
						<h4>Latest Tech Tips</h4>
					</div> <!-- .content-inner -->
				</div> <!-- .tech-tips -->
				<div class="events content-box">
					<div class="content-inner">
						<h4>Upcoming Events</h4>
					</div> <!-- .content-inner -->
				</div> <!-- .events -->
				<div class="videos content-box">
					<div class="content-inner">
						<h4>Latest Videos</h4>
					</div> <!-- .content-inner -->
				</div> <!-- .events -->
			</div> <!-- .container-center -->
		</div> <!-- .row -->
		<div class="row sponsor">
			<?php if (function_exists('vslider')) { vslider('homepage3a'); }?>
			<?php if (function_exists('vslider')) { vslider('homepage3b'); }?>
		</div>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'page' ); ?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
