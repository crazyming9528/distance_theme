<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package distance
 */

get_header();
?>

    <div class="row">
        <div class="distance-top col-12"  <?php if (function_exists('z_taxonomy_image_url')) echo 'style="background-image: url(\''.z_taxonomy_image_url().'\')"'; ?>'>
            <div class="container">
                <div class="row align-items-center description">
                    <div class="col-12 " ><h1><?php echo single_cat_title( '', false ) ; ?></h1>
                        <div class="summary">
                          <?php
                          $category_description = category_description();
                          if ( !empty( $category_description ) ) echo  $category_description ;
                          ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container distance-main">
        <div class="row">
            <div class="col-12 bg-warning">
                文章列表

                1

            </div>
        </div>
    </div>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

                <header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
                </header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;

				the_posts_navigation();

			else :
				echo "not";
//			get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
