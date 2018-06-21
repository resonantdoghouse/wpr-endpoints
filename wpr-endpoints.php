<?php
/*
Plugin Name: WPR Endpoints
Plugin URI: https://catkittycat.com
Description: WP Rest API custom endpoints
Author: Jim
Version: 0.0.3
Author URI: https://catkittycat.com
Text Domain: wpr
*/

if ( ! function_exists( 'add_action' ) ) {
	echo 'Not allowed!';
	exit();
}


define( "POST_TYPE", "post" );
define( "META_KEY", "post_meta_text" );

add_action( 'rest_api_init', 'wpr_rest_route' );

function wpr_rest_route() {
	register_rest_route(
		'wpr/v1',
		'/route/',
		array(
			'methods'  => 'POST',
			'callback' => 'wpdt_post_event',
		)
	);
}

function wpdt_post_event( $request ) {

	$title      = $request->get_param( 'title' );
	$content    = $request->get_param( 'content' );
	$meta_value = $request->get_param( 'meta' );

	$post_id = wp_insert_post( array(
		'post_title'   => $title,
		'post_content' => $content,
//		'meta_input'   => array( META_KEY => $meta_value ),
		'post_type'    => POST_TYPE
	) );

	/**
	 * Custom Field Suite
	 */
	$field_data = array( META_KEY => $meta_value );
	$post_data  = array( 'ID' => $post_id, 'post_type' => POST_TYPE ); // the ID is required

	CFS()->save( $field_data, $post_data );

	return $post_id;

}