 <?php
/**
 * Network About administration panel.
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 3.4.0
 */

/** Load WordPress Administration Bootstrap */
require_once( dirname( __FILE__ ) . '/admin.php' );

if ( ! is_multisite() )
	wp_die( __( 'Multisite support is not enabled.' ) );

require( ABSPATH . 'wp-admin/about.php' );
