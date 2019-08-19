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


    <?php wp_enqueue_script('jquery');
    wp_head(); ?>
    <script src="<?php echo get_theme_file_uri() ?>/js/circleMagic.min.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="distance">

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?>| <?php echo get_bloginfo('description', 'display') ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <header class="distance-header row" style="background-image: url('<?php echo get_header_image() ?>')">

            <?php //the_custom_header_markup() ?>
            <?php
            //            获取自定义图片
            //            echo get_header_image()
            ?>



            <div class="container-fluid">

                <div class="row distance-header-container ">
                    <div class="distance-branding col-4">
                        <?php
                        the_custom_logo();
//                        if (is_front_page() && is_home()) :
//                            ?>
<!--                            <h1 class="distance-title"><a href="--><?php //echo esc_url(home_url('/')); ?><!--"-->
<!--                                                          rel="home">--><?php //bloginfo('name'); ?><!--</a></h1>-->
<!--                        --><?php
//                        else :
//                            ?>
<!--                            <p class="distance-title"><a href="--><?php //echo esc_url(home_url('/')); ?><!--"-->
<!--                                                         rel="home">--><?php //bloginfo('name'); ?><!--</a></p>-->
<!--                        --><?php
//                        endif;
//                        $distance_description = get_bloginfo('description', 'display');
//                        if ($distance_description || is_customize_preview()) :
//                            ?>
<!--                            <p class="distance-description">--><?php //echo $distance_description; /* WPCS: xss ok. */ ?><!--</p>-->
<!--                        --><?php //endif; ?>
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


            <div class="sentence"><p style="color: <?php get_theme_mods('header_textcolor')?>">若能避开猛烈的欢喜 自然也不会有悲痛的来袭</p></div>

        </header>
    </div>


    <div id="content" class="distance-content">
