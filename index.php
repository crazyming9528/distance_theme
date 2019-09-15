<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package distance
 */

get_header();
?>


    <div class="row">




<?php if ( $video ): ?>
    <div class="distance-first-screen col-12 wow fadeIn" style="background-color: black">
    <video class="video_bg" src="<?php echo $video ?>" loop="loop" autoplay="autoplay"></video>
	<?php else: ?>
    <div class="distance-first-screen col-12 wow fadeIn"
         style="background-image: url('<?php echo get_header_image() ?>')">

    <div class="sentence"><p class="wow fadeInDown customize_color"><?php bloginfo( 'description' ); ?>

        </p>
    </div>


<?php endif; ?>
    <!--    <div class="layer"></div>-->
    <!--    <div class="sentence"><p-->
    <!--                style="color: --><?php // echo '#'.get_theme_mod( 'header_textcolor') ?><!--">--><?php //    bloginfo( 'description' ); ?>
    <!---->
    <!--        </p>-->
    <!--    </div>-->

    <svg class="header_down" id="headerDown" viewBox="0 0 32 32" width="100%" height="100%">
        <path d="M15.992 25.304c-0 0-0 0-0.001 0-0.516 0-0.981-0.216-1.31-0.563l-0.001-0.001-14.187-14.996c-0.306-0.323-0.494-0.76-0.494-1.241 0-0.998 0.809-1.807 1.807-1.807 0.517 0 0.983 0.217 1.313 0.565l0.001 0.001 12.875 13.612 12.886-13.612c0.331-0.348 0.797-0.565 1.314-0.565 0.481 0 0.918 0.187 1.242 0.493l-0.001-0.001c0.723 0.687 0.755 1.832 0.072 2.555l-14.201 14.996c-0.33 0.348-0.795 0.564-1.311 0.564-0.001 0-0.003 0-0.004 0h0z"></path>
    </svg>

    </div>


    </div>

    <div class="row">

        <div class="col-12 distance-main-wrapper index-wrapper">

            <!--            显示侧边栏 加上d-md-block-->
            <div class="sidebar-wrapper d-none">
                <div class="distance-sidebar">

					<?php get_sidebar();
					var_dump( wp_get_sidebars_widgets() );
					?>

                </div>


            </div>

            <div class=" container">
                <div class="row index-article-wrapper">

					<?php
					//					$posttags = get_tags();
					//					if ( $posttags ) {
					//						foreach ( $posttags as $tag ) {
					//							echo '标签ID：' . $tag->term_id;
					//							echo '<br />标签名称：' . $tag->name;
					//							echo '<br />标签描述：' . $tag->description;
					//						}
					//					}

					$posttags = get_tags();
					$tag_id   = 0;
					if ( $posttags ) {
						foreach ( $posttags as $tag ) {
							if ( $tag->name == get_theme_mod( 'index_article_tag' ) ) {
								$tag_id = $tag->term_id;
							}
						}
					}


					?>

					<?php

					if ( $tag_id ) {
						$args = array(
							'tag_id'         => $tag_id,//显示指定标签 id
//						'tag_id'         => 43,//显示指定标签 id
							'posts_per_page' => 10,//文章数
						);
						query_posts( $args );//显示指定标签
					}


					if ( have_posts() ) : ?>

                        <ul class="col-12">
							<?php while ( have_posts() ) :the_post(); ?>
                                <li class="row _article-item  wow  fadeIn " data-wow-duration="1.5s">
                                    <div class="col-md-6 _img" onclick="location.href='<?php the_permalink(); ?>'">
										<?php if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail(); ?>
										<?php } else { ?>
                                            <!--没有特色图像暂时不显示-->
										<?php } ?>
                                    </div>
                                    <div class="col-md-6 _box d-flex align-items-center justify-content-start ">
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
                                                <div class="_read-more text-primary"><a href="<?php the_permalink() ?>">阅读</a>
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
            </div>
        </div>
    </div>


<?php
//get_sidebar();
get_footer();
?>