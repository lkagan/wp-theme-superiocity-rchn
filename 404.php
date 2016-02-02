<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Superiocity_RCHN
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops, something went wrong!', 'superiocity_rchn' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>Did you <em>dumb thumb</em> the web address? Try the menu or a search.</p>
					<br>
					<img src="<?php echo get_template_directory_uri(); ?>/images/justin-crash.jpg" class="image-card">
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
