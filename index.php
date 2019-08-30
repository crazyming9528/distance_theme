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

        <div class="distance-first-screen col-12" style="background-image: url('<?php echo get_header_image() ?>')">
            <div class="layer"></div>
            <div class="sentence"><p style="color: <?php get_theme_mods( 'header_textcolor' ) ?>">若能避开猛烈的欢喜
                    自然也不会有悲痛的来袭</p></div>

        </div>

    </div>


<div class=" index-wrapper">
    <div class="row index-article-wrapper">


		<?php
		if ( have_posts() ) : ?>

            <ul class="col-12">
				<?php while ( have_posts() ) :the_post(); ?>
                    <li class="row _article-item  ">
                        <div class="col-md-6 _img ">
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
                                    <span><a href=""><?php comments_popup_link( '0', '1', '%' ); ?>条评论</a></span>
                                    &bull;
                                    <span> 次浏览</span>
                                </p>
                                <p class="_excerpt"> <?php echo esc_attr( get_the_excerpt() ); ?></p>
                                <div class="_footer">
                                    <div class="tags">
			                            <?php the_tags( '', ' ', '' ); ?>
                                    </div>
                                    <div class="_read-more text-primary"><a href="<?php the_permalink() ?>">点击阅读</a></div>

                                </div>
                            </div>
                        </div>
                    </li>

				<?php endwhile; ?>

                <li class="row _article-item">
                    <div class="col-md-6  bg-danger">
                        图
                    </div>
                    <div class="col-md-6 bg-warning">
                        文字
                    </div>
                </li>
            </ul>

		<?php endif;
		?>


        <!--            <li class="row _article-item">-->
        <!--                <div class="col-md-6  bg-danger">-->
        <!--                    图-->
        <!--                </div>-->
        <!--                <div class="col-md-6 bg-warning">-->
        <!--                    文字-->
        <!--                </div>-->
        <!--            </li>-->
        <!---->
        <!---->
        <!--            <li class="row _article-item">-->
        <!--                <div class="col-md-6  bg-danger">-->
        <!--                    图-->
        <!--                </div>-->
        <!--                <div class="col-md-6 bg-warning">-->
        <!--                    文字-->
        <!--                </div>-->
        <!--            </li>-->


        </ul>
    </div>
</div>

    <div class="container">


        <div class="row ">
            <div class="col-9 ">
				<?php
				if ( have_posts() ) : ?>
                    <ul class="distance-article-list">
						<?php while ( have_posts() ) :the_post(); ?>
                            <li class="_item dp_shadow ">
                                <div class="_img">
									<?php if ( has_post_thumbnail() ) { ?>
										<?php the_post_thumbnail(); ?>
									<?php } else { ?>
                                        <!--没有特色图像暂时不显示-->
									<?php } ?>
                                </div>

                                <div class="_text">
                                    <h1 class="_title"><a
                                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                                    <p class="_author-info">
                                        <time><?php echo get_the_date( 'Y-m-d' ); ?></time> &bull;
                                        <span><?php echo get_the_author(); ?></span> &bull;
                                        <span><a href=""><?php comments_popup_link( '0', '1', '%' ); ?>条评论</a></span>
                                        &bull;
                                        <span> 次浏览</span>
                                    </p>
                                    <p class="_excerpt"> <?php echo esc_attr( get_the_excerpt() ); ?></p>
                                    <div class="_footer">
                                        <div class="tags">
											<?php the_tags( '', ' ', '' ); ?>
                                        </div>
                                        <div class="_read-more"><a href="<?php the_permalink() ?>">继续阅读</a></div>

                                    </div>
                                </div>
                            </li>

						<?php endwhile; ?>

                    </ul>


				<?php endif;
				?>


            </div>
            <div class="col-3"><?php get_sidebar( 'right' ); ?></div>

        </div>

    </div>


<?php
//get_sidebar();
get_footer();
