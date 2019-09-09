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

	<footer id="colophon" class="site-footer distance-footer container-fluid">
		<div class="container">
            <div class="row">
                    <div class="site-info col-12 d-flex align-items-center justify-content-center ">
                        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'distance' ) ); ?>">
			                <?php
			                /* translators: %s: CMS name, i.e. WordPress. */
			                printf( esc_html__( 'Proudly powered by %s', 'distance' ), 'WordPress' );
			                ?>
                        </a>
                        <span class="sep"> &nbsp;&nbsp;|&nbsp;&nbsp; </span>
		                <?php
		                /* translators: 1: Theme name, 2: Theme author. */
		                printf( esc_html__( 'Theme: %1$s by  %2$s', 'distance' ), 'Distance', '<a href="https://www.crazyming.cn/">&nbsp; Crazyming </a>' );
		                ?>
                    </div><!-- .site-info -->

            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('pre code').forEach((block) => {
            hljs.highlightBlock(block);
        });
    });
</script>


</body>
</html>
