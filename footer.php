<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Superiocity_RCHN
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="cols">
			<div class="subscribe">
				<a href="" class="button light">Become a Registered Citizen</a>
				<a href="https://itunes.apple.com/podcast/rc-heli-nation-v-2.0/id367091559?mt=2" class="button light">Subscribe on iTunes</a>
				<a href="/rchn-and-android/" class="button light">Subscribe on Android</a>
			</div>
			<div class="social">
				<a href="https://www.facebook.com/RCHNv2/"><i class="fa fa-facebook-square"></i></a>
				<a href="https://twitter.com/rchelination"><i class="fa fa-twitter-square"></i></a>
				<a href="https://vimeo.com/rchelination"><i class="fa fa-vimeo-square"></i></a>
				<br>
				<a href="" class="button light">Sign up for the RCHN Newsletter</a>
			</div>
			<div class="misc-buttons">
				<a href="" class="button light">Shop Awesome RCHN Gear</a>
				<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XWQHMF6J3CQY8" class="button light">Donate via Paypal</a>
				<a href="http://www.helifreak.com/forumdisplay.php?f=445" class="button light">See us on HeliFreak</a>
			</div>
		</div>
		<div class="site-info">
			<span class="copyright">&copy; <?= date( 'Y' ) ?> <span id="inverted-toggle">RC Heli Nation LLC</span></span>
			<span class="sep"> | </span>
			<span class="superiocity-signature">Website by <a href="http://www.superiocity.com/">Superiocity</a></span>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
