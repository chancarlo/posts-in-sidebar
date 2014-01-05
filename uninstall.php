<?php
/**
 * Posts in Sidebar Uninstall
 *
 * @package PostsInSidebar
 * @since 1.0
 */

// Check for the 'WP_UNINSTALL_PLUGIN' constant, before executing
if( ! defined( 'ABSPATH' ) && ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit();

/*
 * Delete the transients, if any
 */
$pis_options = (array) get_option( 'widget_pis_posts_in_sidebar' );
foreach ( $pis_options as $key => $value ) {
	if ( get_transient( $value['widget_id'] . '_query_cache' ) ) {
		delete_transient( $value['widget_id'] . '_query_cache' );
	}
}

/*
 * Delete widget's options from the database
 */
delete_option( 'widget_pis_posts_in_sidebar' );
