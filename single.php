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

<?php if ( have_posts() ): ?>
	<?php while ( have_posts() ):the_post(); ?>
        <div class="row">
	        <?php $getThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),'full'); ?>

            <!--        distance-top 开始-->
            <div class="distance-top col-12" <?php if ($getThumbnail[0]) {
	            echo 'style="background-image: url(\'' . $getThumbnail[0] . '\')"';
            } ?> >


	            <?php if ($getThumbnail[0]){
		            // 如果存在图片 增加shade 遮罩标签, 避免图片过于明亮 影响到标题的 显示效果
	                echo '<div class="shade"></div>';
                } ?>

<!--                        顶部内容区域container开始-->
				<?php if ( has_post_thumbnail() ) { ?>
					<?php //the_post_thumbnail(); ?>
				<?php } else { ?>
                    <!--没有特色图像暂时不显示-->
				<?php } ?>
                <div class="container">
                    <div class="row align-items-center description">
                        <div class="col-12 "><h1><?php the_title(); ?></h1>
                            <div class="summary row d-sm-none ">
                                <div class="author col-12 ">  <span><?php echo get_the_author(); ?></span> &bull; <span> <?php echo get_the_date( 'Y-m-d' ); ?></span></div>
                             <div class="view col-12 "><span><a href=""><?php comments_popup_link( '0', '1', '%' ); ?>条评论</a></span>
                                 &bull; <span><?php post_views( ' ', ' 次浏览' ); ?></span></div>
                            </div>

                            <div class="summary row d-sm-block d-none ">
             <span><?php echo get_the_author(); ?></span> &bull; <span> <?php echo get_the_date( 'Y-m-d' ); ?></span>  &bull;
                               <span><?php comments_popup_link( '0', '1', '%' ); ?>条评论</span>
                                    &bull; <span><?php post_views( ' ', ' 次浏览' ); ?></span>
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


                            <div class="row">

                                <div class="col-10 offset-1  distance-copyright">
                                    <div>1.如需转载本站原创文章，请务必注明文章出处并附上链接，非常感谢。</div>
                                    <div>2.本站用于记录个人 工作、学习、生活，非商业网站，更多信息请 <a
                                                href="http://www.crazyming.com/about/">点击这里</a></div>
                                </div>
                            </div>

                            <div class="row distance-pager">

                                    <div class="previous col-12 col-md-6">
				                      <span>上一篇: </span><?php next_post_link( '%link','<i class="fa fa-angle-left"></i> '.'%title'); ?>
                                    </div>
                                    <div class="next col-12 col-md-6">
				                        <span>下一篇:</span> <?php previous_post_link( '%link','%title'.' <i class="fa fa-angle-right"></i>'); ?>
                                    </div>

                            </div>


                            <div class="row">
                                <div class="col-12">
	                                <?php comments_template(); ?>
                                </div>
                            </div>


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
<?php endif; ?>

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
