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
			<div class="misc-buttons">
				<?php if( ! is_front_page() ): ?>
				<a href="/rchn-citizen-registration/" class="button light">Become a Registered Citizen</a>
				<a href="/#newsletter" class="button light">Sign up for the Newsletter</a>
				<a href="/rchn-store/" class="button light">Shop Awesome RCHN Gear</a>
				<?php endif; ?>
				<a href="https://itunes.apple.com/podcast/rc-heli-nation-v-2.0/id367091559?mt=2" class="button light">Subscribe on iTunes</a>
				<a href="http://subscribeonandroid.com/www.rchelination.com/feed/podcast/" class="button light">Subscribe on Android</a>
				<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=XWQHMF6J3CQY8" class="button light">Donate via Paypal</a>
				<a href="http://www.helifreak.com/forumdisplay.php?f=445" class="button light">See us on HeliFreak</a>
			</div>
		</div>
		<div class="social">
			<a href="https://www.facebook.com/RCHNv2/"><i class="fa fa-facebook-square"></i></a>
			<a href="https://twitter.com/rchelination"><i class="fa fa-twitter-square"></i></a>
			<a href="https://vimeo.com/rchelination"><i class="fa fa-vimeo-square"></i></a>
		</div>
		<div class="site-info">
			<a href="/sitemap/">Sitemap</a>
			<span class="sep"> | </span>
			<span class="copyright">&copy; <?= date( 'Y' ) ?> <span id="inverted-toggle">RC Heli Nation LLC</span></span>
			<span class="sep"> | </span>
			<span class="superiocity-signature">Website by <a href="http://www.superiocity.com/">Superiocity</a></span>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- Google analytics -->
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-2072906-21', 'auto');
	ga('send', 'pageview');

</script>
<!-- END Google Analytics -->
</body>
</html>
