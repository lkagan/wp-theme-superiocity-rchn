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
			<?php
			$episodesQueryArgs = array(
				'posts_per_page' => 5,
				'category_name'  => 'episodes',
				'post_status'    => 'publish',
			);

			$episodesQuery = new WP_Query( $episodesQueryArgs );
			$pp_data = powerpress_get_enclosure_data( $episodesQuery->posts[0]->ID );
			?>
		<div class="row">
			<div class="container-center">
				<div class="content-box player">
					<h4><?= str_replace( 'RCHN V 2.0 ', '', $episodesQuery->posts[0]->post_title ); ?></h4>
					<small><?= date('F j, Y', strtotime($episodesQuery->posts[0]->post_date)); ?></small>
					<p><?= superiocity_rchn_excerpt( $episodesQuery->posts[0]->post_content ); ?></p>
					<audio controls>
						<source src="<?= str_replace(array('www.rchelination.dev', 'rchelination.superiocity.com'), 'www.rchelination.com', $pp_data['url']) ?>" type="audio/mpeg">
					</audio>
				</div>
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
						<h4>Get Awesome RCHN Gear</h4>
						<a href="/rchn-store/"><img src="<?= get_stylesheet_directory_uri() ?>/images/products.jpg" width="334" height="400" alt="RC Heli Nation Gear"></a>
						<a href="/rchn-store/" class="button solid">Shop Now!</a>

					</div> <!-- .content-inner -->
				</div>
				<div class="newsletter content-box">
					<div class="content-inner">
						<h4>Subscribe to the Newsletter</h4>
						<?php get_template_part('template-parts/content', 'email_subscribe'); ?>
					</div> <!-- .content-inner -->
				</div>
				<div class="episodes content-box">
					<div class="content-inner">
						<h4>Latest Episodes</h4>
						<ul>
							<?php

							while ( $episodesQuery->have_posts() ) : $episodesQuery->the_post(); ?>
								<li><a href="<?php the_permalink() ?>"><?= str_replace( 'RCHN V 2.0 ', '',  the_title( null, null, false ) ); ?></a> <span class="date"><?php the_date( 'm/d/y' ); ?></span> </li>
							<?php endwhile; wp_reset_postdata(); ?>
						</ul>
						<a href="/tag/RCHN/" class="small">see all episodes &raquo;</a>
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
						<ul>
							<?php
							$query_args = array (
								'posts_per_page' => 5,
								'tag'            => 'review',
								'post_status'    => 'publish',
							);

							$reviewsQuery = new WP_Query( $query_args );

							while( $reviewsQuery->have_posts() ): $reviewsQuery->the_post(); ?>
								<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
							<?php endwhile; wp_reset_postdata(); ?>
						</ul>
						<a href="/tag/review/" class="small">see all reviews &raquo;</a>
					</div> <!-- .content-inner -->
				</div> <!-- .reviews -->
				<div class="tech-tips content-box">
					<div class="content-inner">
						<h4>Latest Tech Tips</h4>
						<ul>
							<?php
							$techTipQueryArgs = array (
								'posts_per_page' => 5,
								'category_name'  => 'tech-tips',
								'post_status'    => 'publish',
							);

							$techTipQuery = new WP_Query( $techTipQueryArgs );

							while( $techTipQuery->have_posts() ): $techTipQuery->the_post(); ?>
								<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
							<?php endwhile; ?>
						</ul>
						<a href="/tag/review/" class="small">see all tech tips &raquo;</a>
					</div> <!-- .content-inner -->
				</div> <!-- .tech-tips -->
				<div class="videos content-box">
					<div class="content-inner">
						<h4>Latest Videos</h4>
						<?php echo do_shortcode( '[vimeography id="1"]' ); ?>
						<br>
						<a href="/media/rchn-videos/" class="small">see all videos &raquo;</a>
					</div> <!-- .content-inner -->
				</div> <!-- .videos-->







				<div class="events content-box">
					<div class="content-inner">
						<h4>Upcoming Events</h4>
						<?php echo do_shortcode( '[ai1ec events_limit="4" view="agenda"]' ); ?>
						<a href="/calendar/" class="small">see all events &raquo;</a>
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
