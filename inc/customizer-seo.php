<?php
function seo_customize_register( $wp_customize ) {


	$wp_customize->add_section( 'distance_display', array(
		'title' => '效果设置',
		'panel'    => 'distance_appearance_settings',
		'priority' => 20
	) );

	$wp_customize->add_section( 'distance_seo', array(
		'title' => 'SEO设置',
		'panel'    => 'distance_appearance_settings',
		'priority' => 21
	) );


	$wp_customize->add_section( 'distance_icp', array(
		'title' => '备案号设置',
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
			'section' => 'distance_display',
			'settings' => 'show_animation',
			'description' => __( ' 1表示开启 0表示关闭 点击发布后 退出自定义 即可生效' ),
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
			'section'  => 'distance_icp',
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
			'section'  => 'distance_icp',
			'type'     => 'text',
		)
	));
//
//	//页脚代码
//	$wp_customize->add_setting( 'seo_footer_code', array(
//			'default' => '',
//			'transport' => 'postMessage',
//			'sanitize_callback' => 'esc_html'
//		)
//	);
//
//	$wp_customize->add_control(new WP_Customize_Control(
//		$wp_customize,
//		'seo_footer_code',
//		array(
//			'label' => __('页脚脚本区域'),
//			'description' => __( '例如统计代码等' ),
//			'section'  => 'distance_seo',
//			'type'     => 'textarea',
//		)
//	));

}


add_action( 'customize_register', 'seo_customize_register' );