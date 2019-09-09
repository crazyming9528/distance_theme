<?php
/**
 * distance functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package distance
 */

if ( ! function_exists( 'distance_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function distance_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on distance, use a find and replace
		 * to change 'distance' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'distance', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );


		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
//		register_nav_menus( array(
////			'menu-1' => esc_html__( 'Primary', 'distance' ),
//            'distance_menu' => __( 'distance_menu' ),
//		) );

		//注册菜单
		register_nav_menus(
			array(
				'top_menu'    => __( '顶部菜单', 'distance' ),
				'bottom_menu' => __( '底部菜单', 'distance' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
//		add_theme_support( 'custom-background', apply_filters( 'distance_custom_background_args', array(
//			'default-color' => 'ffffff',
//			'default-image' => '',
//		) ) );


		// 不加 add_theme_support custom-header   自定义顶部图像时无法  跳过裁剪
		add_theme_support( 'custom-header', array(
			'width'      => 2680,//自定义宽度
			'flex-width' => true,//自适应宽度
			'height'     => 800,//自定义高度
			'flex-heigt' => true,//自适应高度
			'uploads'    => true
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );


	}
endif;
add_action( 'after_setup_theme', 'distance_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function distance_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'distance_content_width', 640 );
}

add_action( 'after_setup_theme', 'distance_content_width', 0 );

/* 访问计数 */
function record_visitors() {
	if ( is_singular() ) {
		global $post;
		$post_ID = $post->ID;
		if ( $post_ID ) {
			$post_views = (int) get_post_meta( $post_ID, 'views', true );
			if ( ! update_post_meta( $post_ID, 'views', ( $post_views + 1 ) ) ) {
				add_post_meta( $post_ID, 'views', 1, true );
			}
		}
	}
}

add_action( 'wp_head', 'record_visitors' );


/*
 * 搜索模块 前台页面搜索DOM结构自定义，样式自定义
 */
function distance_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div class="form-group" style="margin-bottom:0;">
	<input type="search" required  autocomplete="off" value="' . get_search_query() . '" name="s" id="s" class="form-control" placeholder="' . __( '按回车搜索...', 'distance' ) . '" />
	<input type="submit" id="searchsubmit"  class="search_btn " value="' . esc_attr__( 'Search' ) . '" />
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'distance_search_form' );


/// 函数名称：post_views
/// 函数作用：取得文章的阅读次数
function post_views( $before = '(点击 ', $after = ' 次)', $echo = 1 ) {
	global $post;
	$post_ID = $post->ID;
	$views   = (int) get_post_meta( $post_ID, 'views', true );
	if ( $echo ) {
		echo $before, number_format( $views ), $after;
	} else {
		return $views;
	}
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function distance_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'distance' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'distance' ),
		'before_widget' => '<section id="%1$s" class=" widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'distance_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function distance_scripts() {
	wp_enqueue_style( 'distance-style', get_stylesheet_uri() );

	wp_enqueue_script( 'distance-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'distance-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
//    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_deregister_script( 'jquery' );//移除自带 jquery
	wp_register_script( 'jquery', 'https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js'); //注册 新的jquery
	wp_enqueue_script( 'jquery' );//将新注册的jq 加入主题
}

add_action( 'wp_enqueue_scripts', 'distance_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


//remove_filter('pre_term_description', 'wp_filter_kses');//使得分类描述支持html代码