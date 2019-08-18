<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package distance
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_theme_file_uri() ?>/frame/bs4/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_theme_file_uri() ?>/css/base.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="<?php echo get_theme_file_uri()?>/js/html5shiv.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="distance">

    <div class="container-fluid">


        <header class="distance-header row">
            <?php
            //        wp_nav_menu(array(
            //            'theme_location' => 'distance_menu',//注册菜单的名称
            //            'container_class' => 'my_extra_menu_class'
            //        ) );

            ?>
            <div class="container-fluid">
                <div class="row distance-header-container ">
                    <div class="distance-branding col-4">
                        <?php
                        the_custom_logo();
                        if (is_front_page() && is_home()) :
                            ?>
                            <h1 class="distance-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                          rel="home"><?php bloginfo('name'); ?></a></h1>
                        <?php
                        else :
                            ?>
                            <p class="distance-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                         rel="home"><?php bloginfo('name'); ?></a></p>
                        <?php
                        endif;
                        $distance_description = get_bloginfo('description', 'display');
                        if ($distance_description || is_customize_preview()) :
                            ?>
                            <p class="distance-description"><?php echo $distance_description; /* WPCS: xss ok. */ ?></p>
                        <?php endif; ?>
                    </div>
                    <nav id="distance-navigation" class="main-navigation col-8">
                        <button class="menu-toggle" aria-controls="primary-menu"
                                aria-expanded="false"><?php esc_html_e('Primary Menu', 'distance'); ?></button>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-1',
                            'menu_id' => 'primary-menu',
                        ));
                        ?>
                    </nav><!-- #distance-navigation -->
                </div>

            </div>


            <div class="sentence"><p>若能避开猛烈的欢喜 自然也不会有悲痛的来袭</p></div>


            <video class="home_video" autoplay="" loop="" muted=""
                   src="<?php echo get_theme_file_uri() ?>/img/yuzhou.webm"></video>
        </header>
    </div>


    <div id="content" class="distance-content">
