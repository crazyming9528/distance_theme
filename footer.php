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

<div class="distance-footer container-fluid link">
    <div class="container">
        <div class="row">
            <!--                友情链接-->
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'bottom_menu',
					'menu_id'        => 'bottom_menu',
					'menu_class'     => 'col-12 btm d-flex flex-wrap',
					'container'      => false,
				)
			);
			?>
        </div>
    </div>
</div>
<footer id="colophon" class="site-footer distance-footer container-fluid  site-info">

    <div class="row">

        <div class="_part copyright col-12 d-flex align-items-center justify-content-center">
            Copyright &copy; <?php echo date( 'Y' ); ?> <span class="separator"></span> <a class="vc-a"
                                                                                           href="#"><?php bloginfo( 'name' ); ?></a>
            <span class="separator"> &bull;</span>
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'distance' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'powered by %s', 'distance' ), 'WordPress' );
				?>
            </a>
        </div>

        <div class="_part theme col-12 d-flex align-items-center justify-content-center">
            The theme is made by Crazyming
        </div>

        <div class="_part icp col-12 d-flex align-items-center justify-content-center">

            <span> <?php echo get_theme_mod( 'icp' ); ?> </span>
            <span> <?php echo ! empty( get_theme_mod( '110icp' ) ) ? " " . ( get_theme_mod( '110icp' ) ) : "";; ?> </span>
            <span> <?php echo ! empty( get_theme_mod( 'footer_code' ) ) ? html_entity_decode( esc_js( get_theme_mod( 'footer_code' ) ) ) : "";; ?> </span>

        </div>
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->
<div class="load-container" id="load-container">
    <div class="boxLoading"></div>
</div>
<div id="aplayer"></div>

<?php wp_footer(); ?>

<!--<script src="--><?php //echo get_theme_file_uri() ?><!--/frame/bs4/js/bootstrap.min.js"></script>-->
<script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        src="//lib.baomitu.com/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!--<script src="--><?php //echo get_theme_file_uri() ?><!--/js/prism/prism.js"></script>-->
<script crossorigin="anonymous" integrity="sha384-+oMXldEzJ/GD3RG8VKoUscTcrjXUGNDqidfsx4A1rTfX5/w9L+80CiF2XaiRKBGz"
        src="//lib.baomitu.com/prism/9000.0.1/prism.min.js"></script>
<!--<script src="--><?php //echo get_theme_file_uri() ?><!--/js/wow.min.js"></script>-->
<script crossorigin="anonymous" integrity="sha384-V27yAyb3yYhZbiwaK9Sgxh9Cywkf/H2al4wcrcp/hKF9ZYT7d5saGJFoO/0v1Cgs"
        src="//lib.baomitu.com/wow/1.1.2/wow.min.js"></script>

<script src="<?php echo get_theme_file_uri() ?>/js/jsmpeg.js"></script>


<script>
    new WOW().init();

	<?php
	$video = get_header_video_url();
	$video_m = get_theme_mod( 'index_video_m' );;//手机首页 视频地址 ts格式
	$show_animation = get_theme_mod( 'show_animation', true );
	$index_audio =  get_theme_mod( 'index_audio');//
	?>
    //var isShow = '<?php //echo( ! $video && $show_animation )  ?>//';
    var isShow = '<?php echo( $show_animation )  ?>';
    var isHome = '<?php wp_reset_query(); echo is_home()  ?>';//wp_reset_query 是为了解决is_home 失效的问题
    var haveVideo_m = '<?php echo( $video_m )  ?>';
    var haveAudio = <?php echo( json_encode($index_audio) )  ?>;
    if (isShow && isHome) {
        localStorage.setItem('show_animation', '1')
    } else {
        localStorage.setItem('show_animation', '0')
    }

    if (haveVideo_m && isHome) {
        // localStorage.setItem('show_video', 'https://www.crazyming.com/assets/xj.ts')
        localStorage.setItem('show_video_m', '<?php echo $video_m ?>')
    } else {
        localStorage.setItem('show_video_m', '0')
    }


    if (haveAudio && isHome) {
        localStorage.setItem('show_audio', haveAudio)
    } else {
        localStorage.setItem('show_audio', '0')
    }


</script>
<script src="<?php echo get_theme_file_uri() ?>/js/distance.js"></script>
</body>
</html>
