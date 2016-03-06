<?php
/**
 * The template for displaying the definitions archive.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Superiocity_RCHN
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<article id="page-glossary" class="type-page">
					<header class="page-header">
						<h1 class="entry-title page-title">Glossary of Terms</h1>
					</header><!-- .page-header -->
					<div class="entry-content">
						<dl>
							<?php $args = array( 
								'orderby' => 'title',
								'order' => 'ASC',
								'posts_per_page' => -1,
								'post_type' => 'definition',
								'post_status' => 'publish',
							); 
							
							$query = new WP_Query( $args ); ?>
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<dt><?php the_title() ?></dt>
							<dd><?php the_content() ?></dd>
						<?php endwhile; ?>
						</dl>
					</div><!-- .entry-content -->
				</article>
			</main><!-- #main -->
		</div><!-- #primary -->

<?php get_footer(); ?>
