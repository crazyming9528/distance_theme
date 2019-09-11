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

$description = '';
$keywords    = '';
if ( is_home() ) {
	// 将以下引号中的内容改成你的主页description
	$description = get_theme_mod( 'seo_description' );
	// 将以下引号中的内容改成你的主页keywords
	$keywords = get_theme_mod( 'seo_keywords' );
} elseif ( is_page() ) {
	$id          = $post->ID;
	$description = trim( get_post_meta( $id, "description", true ) );
	// 将以下引号中的内容改成你的主页keywords
	$keywords = trim( get_post_meta( $id, "keywords", true ) );

} elseif ( is_single() ) {
	$id = $post->ID;
	//文章描述 为文章摘要
	$description1 = get_post( $id )->post_excerpt;
	// 文章的 关键词 为  自定义字段  keywords  拼接  tag标签名 拼接 博客名称
	$keywords = trim( get_post_meta( $id, "keywords", true ) );
	if ( $keywords !='' && mb_substr( $keywords, - 1 ) !== ',' ) {
		$keywords .= ',';
	}
	$tags = wp_get_post_tags( $post->ID );
	foreach ( $tags as $tag ) {
		$keywords = $keywords . $tag->name . ",";
	}
	$keywords .= get_bloginfo( 'name' );
	$keywords = rtrim( $keywords, ',' );

} elseif ( is_category() ) {
	// 分类的description可以到后台 - 文章 -分类目录，修改分类的描述
	$description = category_description();

	$keywords = single_cat_title( '', false ) . ',' . get_bloginfo( 'name' );;
} elseif ( is_tag() ) {
	// 标签的description可以到后台 - 文章 - 标签，修改标签的描述
	$description = tag_description();

	$keywords = single_tag_title( '', false ) . ',' . get_bloginfo( 'name' );;;
}
$description = trim( strip_tags( $description ) );
$keywords    = trim( strip_tags( $keywords ) );

$description = $description ? $description : get_theme_mod( 'seo_description' );
$keywords    = $keywords ? $keywords : get_theme_mod( 'seo_keywords' );

?>


<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $keywords; ?>"/>
    <meta name="description" content="<?php echo $description; ?>"/>
    <link rel="stylesheet" href="<?php echo get_theme_file_uri() ?>/css/nec-base.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_theme_file_uri() ?>/frame/bs4/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/css/distance.css" type="text/css"/>
    <link rel="stylesheet"
          href="<?php echo get_theme_file_uri(); ?>/css/hightlightjs-a11y-dark.css"/>

    <!--[if lt IE 9]>
    <script src="<?php echo get_theme_file_uri()?>/js/html5shiv.min.js"></script>
    <![endif]-->


	<?php
	wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="distance">


    <div class="container-fluid distance-head">

        <nav class="navbar navbar-expand-md navbar-dark " role="navigation">
            <div class="container-fluid">
                <a class="navbar-brand"
                   href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                <button id="toggle_nav" class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="<?php esc_attr_e( '顶部菜单' ); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'top_menu',
						'menu_class'      => 'navbar-nav ml-auto',
						'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
						'container'       => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarSupportedContent',
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'walker'          => new WP_Bootstrap_Navwalker()
					)
				);
				?>

            </div>
        </nav>


    </div>


    <div id="content" class="distance-mainbody container-fluid">
