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
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_theme_file_uri() ?>/css/base.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_theme_file_uri() ?>/frame/bs4/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/css/animate.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="<?php echo get_theme_file_uri()?>/js/html5shiv.min.js"></script>
    <![endif]-->


	<?php
	wp_enqueue_script( 'jquery' );
	wp_head(); ?>
    <script src="<?php echo get_theme_file_uri() ?>/js/circleMagic.min.js"></script>
    <script src="<?php echo get_theme_file_uri() ?>/frame/bs4/js/bootstrap.min.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="distance">


    <div class="container-fluid head">
        <div class="row top align-items-center">
            <!--            <ul class="distance-nav">-->
            <!--                <li><a href="#">Home</a></li>-->
            <!--                <li><a href="#">About</a></li>-->
            <!--                <li><a href="#">Products</a></li>-->
            <!--                <li><a href="#">Contact</a></li>-->
            <!--            </ul>-->

            <div class="logo col-6 col-md-3 ">
                <!--        --><?php //the_custom_logo(); ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php  bloginfo( 'name' ); ?></a>
            </div>
			<?php

			wp_nav_menu(
				array(
					'theme_location'  => 'top_menu',
					'menu_id'         => 'top-menu',
					'menu_class'      => 'distance_nav',
					'container_class' => 'distance_nav_wrapper d-none  d-md-flex  col-md-9'
				)
			);
			?>

        </div>

    </div>


    <div id="content" class="distance-mainbody container-fluid">
