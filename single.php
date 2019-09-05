<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package distance
 */

get_header();
?>

<?php if(have_posts()): ?>
	<?php while(have_posts()):the_post(); ?>
    <div class="row">

        <!--        distance-top 开始-->
        <div class="distance-top col-12" >
        <!--        顶部内容区域container开始-->
	        <?php if ( has_post_thumbnail() ) { ?>
		        <?php the_post_thumbnail(); ?>
	        <?php } else { ?>
                <!--没有特色图像暂时不显示-->
	        <?php } ?>
        <div class="container">
            <div class="row align-items-center description">
                <div class="col-12 "><h1><?php the_title(); ?></h1>
                    <div class="summary">
	                   <span>  <span><?php echo get_the_author(); ?></span> 发布于<?php echo get_the_date( 'Y-m-d'); ?></span> &bull; <span><a href=""><?php comments_popup_link( '0','1','%');?>条评论</a></span> &bull;  <span><?php post_views(' ', ' 次浏览'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <!--        顶部内容区域container结束-->
    </div>
    <!--        distance-top 结束-->
    </div>
    <div class="row">
        <div class="col-12 distance-main-wrapper single-wrapper">

            <div class="container distance-main dp_shadow">

                <div class="row  single-article-wrapper">

                    <div class="col-12 col-lg-9 distance-article-content">

                        <!--                        文章区域-->
	                    <?php the_content(); ?>

                    </div>


                    <div class="sidebar-wrapper col-12 col-lg-3">
                        <div class="distance-sidebar">
                            <!--                            侧边栏-->
							<?php
							get_sidebar();
							?>
                        </div>

                    </div>


                </div>


            </div>
        </div>
    </div>

	<?php endwhile; ?>
<?php endif;?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

<!--			--><?php
//			while ( have_posts() ) :
//				the_post();
//
//				get_template_part( 'template-parts/content', get_post_type() );
//
//				the_post_navigation();
//
//				// If comments are open or we have at least one comment, load up the comment template.
//				if ( comments_open() || get_comments_number() ) :
//					comments_template();
//				endif;
//
//			endwhile; // End of the loop.
//			?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
