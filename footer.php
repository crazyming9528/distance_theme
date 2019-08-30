<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package distance
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
<!--		<div class="site-info">-->
<!--			<a href="--><?php //echo esc_url( __( 'https://wordpress.org/', 'distance' ) ); ?><!--">-->
<!--				--><?php
//				/* translators: %s: CMS name, i.e. WordPress. */
//				printf( esc_html__( 'Proudly powered by %s', 'distance' ), 'WordPress' );
//				?>
<!--			</a>-->
<!--			<span class="sep"> | </span>-->
<!--				--><?php
//				/* translators: 1: Theme name, 2: Theme author. */
//				printf( esc_html__( 'Theme: %1$s by %2$s.', 'distance' ), 'distance', '<a href="http://underscores.me/">Underscores.me</a>' );
//				?>
<!--		</div><!-- .site-info -->-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
   jQuery(document).ready(function ($) {

       $('.distance-first-screen').circleMagic({
           elem: '.distance-first-screen',
           radius: 15,
           densety: .15,
           color: 'rgba(255,255,255, .25)',
           // color: 'random',
           clearOffset: .15
       });
   })
</script>

</body>
</html>