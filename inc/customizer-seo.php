<?php
function seo_customize_register( $wp_customize ) {


	$wp_customize->add_section( 'distance_index', array(
		'title' => '首页设置',
		'panel'    => 'distance_appearance_settings',
		'priority' => 20
	) );

	$wp_customize->add_section( 'distance_seo', array(
		'title' => 'SEO设置',
		'panel'    => 'distance_appearance_settings',
		'priority' => 21
	) );


	$wp_customize->add_section( 'distance_footer', array(
		'title' => 'footer设置(备案号,统计代码)',
		'panel'    => 'distance_appearance_settings',
		'priority' => 22
	) );


	// 是否显示首页 第一屏动画效果
	$wp_customize->add_setting('show_animation', array(
		'default' => '1',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'show_animation',
		array(
			'label' => __('首页第一屏动画开关'),
			'section' => 'distance_index',
			'settings' => 'show_animation',
			'description' => __( ' 1表示开启 0表示关闭 点击发布后 退出自定义 即可生效' ),
			'type' => 'text',
		)
	));



	// 首页第一屏标题
	$wp_customize->add_setting('index_title', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'index_title',
		array(
			'label' => __('首屏标题'),
			'section' => 'distance_index',
			'settings' => 'index_title',
//			'description' => __( '' ),
			'type' => 'text',
		)
	));



	// 首页第一屏描述
	$wp_customize->add_setting('index_description', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'index_description',
		array(
			'label' => __('首屏描述'),
			'section' => 'distance_index',
			'settings' => 'index_description',
//			'description' => __( '' ),
			'type' => 'text',
		)
	));


	// 首页显示文章的标签
	$wp_customize->add_setting('index_article_tag', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'index_article_tag',
		array(
			'label' => __('首页文章标签'),
			'section' => 'distance_index',
			'settings' => 'index_article_tag',
			'description' => __( '首页仅显示该标签的文章,如需显示所有文章请留空!' ),
			'type' => 'text',
		)
	));








	// 网站关键词
	$wp_customize->add_setting('seo_keywords', array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'seo_keywords',
		array(
			'label' => __('网站关键词'),
			'section' => 'distance_seo',
			'settings' => 'seo_keywords',
			'description' => __( ' 请使用使用英文逗号分隔各个关键词，例如：wordpress,web,php,javascript ' ),
			'type' => 'textarea',
		)
	));




	// 网站描述
	$wp_customize->add_setting('seo_description', array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'seo_description',
		array(
			'label' => __('网站描述'),
			'section' => 'distance_seo',
			'settings' => 'seo_description',
			'type' => 'textarea',
		)
	));





	//备案号
	$wp_customize->add_setting( 'icp', array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'icp',
		array(
			'label' => __('备案号'),
			'section'  => 'distance_footer',
			'type'     => 'text',
		)
	));

	//公安备案号
	$wp_customize->add_setting( '110icp', array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'110icp',
		array(
			'label' => __('公安备案号'),
			'description' => __( '' ),
			'section'  => 'distance_footer',
			'type'     => 'text',
		)
	));

	//页脚代码
	$wp_customize->add_setting( 'footer_code', array(
			'default' => '',
			'transport' => 'postMessage',
			'sanitize_callback' => 'esc_js'
		)
	);

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'footer_code',
		array(
			'label' => __('页脚脚本区域'),
			'description' => __( '例如统计代码等' ),
			'section'  => 'distance_footer',
			'type'     => 'textarea',
		)
	));

}


add_action( 'customize_register', 'seo_customize_register' );