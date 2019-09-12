<?php


/**
 * 更换头像镜像
 *
 * @param $avatar
 *
 * @return mixed
 */
function frenemyget_ssl_avatar( $avatar ) {
	$avatar = str_replace(
		array(
			"www.gravatar.com",
			"0.gravatar.com",
			"1.gravatar.com",
			"2.gravatar.com",
			"secure.gravatar.com"
		), "cn.gravatar.com", $avatar );

	return $avatar;
}

add_filter( 'get_avatar', 'frenemyget_ssl_avatar' );

/*
 * 文章外部链接加上nofollow
 */
function cn_nf_url_parse( $content ) {

	$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>";
	if ( preg_match_all( "/$regexp/siU", $content, $matches, PREG_SET_ORDER ) ) {
		if ( ! empty( $matches ) ) {

			$srcUrl = get_option( 'siteurl' );
			for ( $i = 0; $i < count( $matches ); $i ++ ) {

				$tag  = $matches[ $i ][0];
				$tag2 = $matches[ $i ][0];
				$url  = $matches[ $i ][0];

				$noFollow = '';

				$pattern = '/target\s*=\s*"\s*_blank\s*"/';
				preg_match( $pattern, $tag2, $match, PREG_OFFSET_CAPTURE );
				if ( count( $match ) < 1 ) {
					$noFollow .= ' target="_blank" ';
				}

				$pattern = '/rel\s*=\s*"\s*[n|d]ofollow\s*"/';
				preg_match( $pattern, $tag2, $match, PREG_OFFSET_CAPTURE );
				if ( count( $match ) < 1 ) {
					$noFollow .= ' rel="nofollow" ';
				}

				$pos = strpos( $url, $srcUrl );
				if ( $pos === false ) {
					$tag     = rtrim( $tag, '>' );
					$tag     .= $noFollow . '>';
					$content = str_replace( $tag2, $tag, $content );
				}
			}
		}
	}
	$content = str_replace( ']]>', ']]>', $content );

	return $content;
}

add_filter( 'the_content', 'cn_nf_url_parse' );


////function add_custom_field_automatically($post_ID) {
////	global $wpdb;
////	if(!wp_is_post_revision($post_ID)) {
////		add_post_meta($post_ID, 'keywords', '', true);
////		add_post_meta($post_ID, 'description', '', true);
////	}
////}
////
////add_action('publish_page', 'add_custom_field_automatically');//发布页面时
////add_action('publish_post', 'add_custom_field_automatically');//发布文章时
//
///**
// * 字符截断
// *
// * @param $str
// * @param $start
// * @param $width
// * @param $trimmarker
// *
// * @return string
// */
//function dm_strimwidth( $str, $start, $width, $trimmarker ) {
//	$output = preg_replace( '/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $start . '}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $width . '}).*/s', '\1', $str );
//
//	return $output . $trimmarker;
//}