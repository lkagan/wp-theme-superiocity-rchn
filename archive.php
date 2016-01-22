<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Superiocity_RCHN
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						$the_title = get_the_archive_title();

						switch ( $the_title ) {
							case 'Tag: RCHN':
								$the_title = 'Episodes';
								break;
							case 'Tag: Review':
								$the_title = 'Reviews';
								break;
							case 'Category: Tech Tips':
								$the_title = 'Tech Tips';
								break;
							case 'Tag: digginin':
								$the_title = 'Diggin\' In';
								break;
						}
						?>
						<?php echo esc_html( $the_title ); ?>
					</h1>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
					?>

				<?php endwhile; ?>

				<div class="pagination">
					<?php echo paginate_links( array( 'prev_text' => '&laquo;', 'next_text' => '&raquo;' ) ); ?>
				</div>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
