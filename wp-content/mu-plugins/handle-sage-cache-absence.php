<?php

// Only run on WPE.
if ( ! defined( 'PWP_NAME' )  ) {
	return;
}

// Disable on WP CLI.
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	return;
}

// Allow admin access.
if ( is_admin() || '/wp-login.php' === $_SERVER['PHP_SELF'] ) {
	return;
}

$sage_cache_dir = '/tmp/sage-cache/' . PWP_NAME . '/';

if ( file_exists( $sage_cache_dir ) && is_writable( $sage_cache_dir ) ) {
	return;
}

/**
 * Sage cache does not exist or is not writable: display maintenance page.
 */

status_header( 503 );

/**
 * @see wp_maintenance()
 */
if ( file_exists( WP_CONTENT_DIR . '/maintenance.php' ) ) {
	require_once WP_CONTENT_DIR . '/maintenance.php';
	die();
}

require_once ABSPATH . WPINC . '/functions.php';
wp_load_translations_early();

header( 'Retry-After: 600' );

wp_die(
	__( 'Briefly unavailable for scheduled maintenance. Check back in a minute.' ),
	__( 'Maintenance' ),
	503
);
