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
        <div class="distance-top col-12" <?php if ( function_exists( 'z_taxonomy_image_url' ) && z_taxonomy_image_url() !='' ) {
			echo 'style="background-image: url(\'' . z_taxonomy_image_url() . '\')"';
		} ?>>


	        <?php if (function_exists( 'z_taxonomy_image_url' ) && z_taxonomy_image_url() !=''){
		        // 如果存在图片 增加shade 遮罩标签, 避免图片过于明亮 影响到标题的 显示效果
		        echo '<div class="shade"></div>';
	        } ?>

<!--        <div class="distance-top col-12">-->
<!---->
<!--	        --><?php //if ( function_exists( 'z_taxonomy_image_url' ) ) {
//	        			echo '<img src=\'' . z_taxonomy_image_url() . '\' />';
//	        		} ?>
<!--        </div>-->
        <!--        顶部内容区域container开始-->
        <div class="container">
            <div class="row align-items-center description">
                <div class="col-12 ">



<!--                        --><?php //echo single_cat_title( '', false ); ?>


                        <?php
                        if ( is_day() ) :
	                        printf( '<h1 class="big">' . get_the_date() . '</h1>' );
                        elseif ( is_month() ) :
	                        printf( '<h1 class="big">' . get_the_date( _x( 'Y F', 'monthly archives date format', 'distance' ) ) . '</h1>' );
                        elseif ( is_year() ) :
	                        printf(  '<h1 class="big">' . get_the_date( _x( 'Y', 'yearly archives date format', 'distance' ) ) . '</h1>' );
                        elseif ( is_category() ) :
	                        printf( '<h1 class="big">' . single_cat_title( '', false ) . '</h1>' );
                        elseif ( is_tag() ) :
	                        printf( '<h1 class="big">' . single_tag_title( '', false ) . '</h1>' );
                        elseif ( is_author() ) :
	                        printf( '<h1 class="big">' . get_the_author() . '</h1>' );
                        else :
	                        _e( 'Archives', 'distance' );
                        endif;
                        ?>






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
                                    <li class="row _article-item  ">

										<?php if ( has_post_thumbnail() ) { ?>

                                                <a class="col-12   _img" href="<?php the_permalink(); ?>">
                                                    <div class=" ">
													<?php the_post_thumbnail(); ?>
                                                    </div>
                                                </a>

										<?php } else { ?>
                                            <!--没有特色图像暂时不显示-->
                                            <div class="d-none   _img  ">
                                            </div>
										<?php } ?>

                                        <div class="col-12 _box d-flex align-items-center justify-content-start ">
                                            <div class="_font">
                                                <h1 class="_title"><a
                                                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h1>
                                                <p class="_author-info">
                                                    <time><?php echo get_the_date( 'Y-m-d' ); ?></time> &bull;
                                                    <span><?php echo get_the_author(); ?></span> &bull;
                                                    <span><?php comments_popup_link( '0', '1', '%' ); ?> 条评论</span>
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



                        <div class="page">

	                        <?php

	                        if ( function_exists( 'wp_pagenavi' ) ) {
		                        wp_pagenavi();
	                        }

	                        ?>

                        </div>

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
