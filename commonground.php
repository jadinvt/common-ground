<?php
/**
 * @package Common_Ground
 * @author Jad Davis
 * @version .01
 */
/*
Plugin Name: Common Ground
Plugin URI: N/A
Description: The common ground plugin allows for specific highlighting, commenting, and questioning of position oriented posts along with question ranking, and user acceptance of propositions.
Author: Jad Davis
Version: .01
Author URI: http://jad-davis.com
*/

/**
* Guess the wp-content and plugin urls/paths
*/
if ( !defined('WP_CONTENT_URL') )
    define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if ( !defined('WP_CONTENT_DIR') )
    define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );

if (!defined('PLUGIN_URL'))
    define('PLUGIN_URL', WP_CONTENT_URL . '/plugins/');
if (!defined('PLUGIN_PATH'))
    define('PLUGIN_PATH', WP_CONTENT_DIR . '/plugins/');

function hello_dolly_get_lyric() {

}

// This just echoes the chosen line, we'll position it later
function hello_dolly() {

}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'hello_dolly');

// We need some CSS to position the paragraph
function dolly_css() {
	echo "
	<style type='text/css'>
	#dolly {
		position: absolute;
		top: 4.5em;
		margin: 0;
		padding: 0;
		right: 215px;
		font-size: 11px;
	}
	</style>
	";
}

function common_ground_enqueue_scripts() {
  wp_enqueue_script("jquery");
  wp_enqueue_script('wordpress-wiki', PLUGIN_URL . "common-ground/common-ground.js");
}
add_action('admin_head', 'dolly_css');
add_action('init', 'common_ground_enqueue_scripts', 9);
?>
