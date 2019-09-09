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

        <!--        distance-top 开始-->
        <div class="distance-top col-12" <?php if ( function_exists( 'z_taxonomy_image_url' ) ) {
			echo 'style="background-image: url(\'' . z_taxonomy_image_url() . '\')"';
		} ?>'>
        <!--        顶部内容区域container开始-->
        <div class="container">
            <div class="row align-items-center description">
                <div class="col-12 "><h1><?php echo single_cat_title( '', false ); ?></h1>
                    <div class="summary">
						<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) ) {
							echo $category_description;
						}
						?>
                    </div>
                </div>
            </div>
        </div>
        <!--        顶部内容区域container结束-->
    </div>
    <!--        distance-top 结束-->
    </div>
    <div class="row">
    <div class="col-12 distance-main-wrapper archive-wrapper">

        <div class="container distance-main dp_shadow">

            <div class="row  archive-article-wrapper">

                <div class="col-12 col-lg-9">

					<?php
					if ( have_posts() ) : ?>

                        <ul>
							<?php while ( have_posts() ) :the_post(); ?>
                                <li class="row _article-item  dp_shadow ">
                                    <div class="col-12  _img ">
										<?php if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail(); ?>
										<?php } else { ?>
                                            <!--没有特色图像暂时不显示-->
										<?php } ?>
                                    </div>
                                    <div class="col-12 _box d-flex align-items-center justify-content-start ">
                                        <div class="_font">
                                            <h1 class="_title"><a
                                                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                            <p class="_author-info">
                                                <time><?php echo get_the_date( 'Y-m-d' ); ?></time> &bull;
                                                <span><?php echo get_the_author(); ?></span> &bull;
                                                <span><a href=""><?php comments_popup_link( '0', '1', '%' ); ?> 条评论</a></span>
                                                &bull;
                                                <span> <?php post_views( ' ', ' 次浏览' ); ?></span>
                                            </p>
                                            <p class="_excerpt"> <?php echo esc_attr( get_the_excerpt() ); ?></p>
                                            <div class="_footer">
                                                <div class="tags">
													<?php the_tags( '', ' ', '' ); ?>
                                                </div>
                                                <div class="_read-more text-primary"><a
                                                            href="<?php the_permalink() ?>">阅读</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </li>

							<?php endwhile; ?>


                        </ul>

					<?php endif;
					?>

                </div>


                <div class="sidebar-wrapper col-12 col-lg-3">
                    <div class="distance-sidebar">
					<?php
					get_sidebar();
					?>
                    </div>

                </div>


            </div>


        </div>
    </div>
    </div>
<?php
get_footer();
