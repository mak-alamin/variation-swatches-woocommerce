<?php
/**
* Plugin Name: WooCommerce Variation Swatches
* Plugin URI: https://www.makalamin.com
* Description: Wonderful variation swatches for WooCommerce products.
* Version: 1.0.0
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Mak Alamin
* Author URI:
* License: GPL v2 or later
* License URI: https: //www.gnu.org/licenses/gpl-2.0.html
* Update URI: 
* Text Domain: variation-swatches-woocommerce
* Domain Path: /languages
*/

// If this file is called firectly, abort!!!
defined('ABSPATH') or die('Hey, Stay out of here. You are blocked!');

// Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * Define constants
 */
define('WP_WOO_VS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WP_WOO_VS_PLUGIN_URL', plugins_url('/', __FILE__));
define('WP_WOO_VS_ASSETS', plugins_url('/assets', __FILE__));

define('WP_WOO_VS_ADMIN_DIR', WP_WOO_VS_PLUGIN_DIR . '/inc/Admin');
define('WP_WOO_VS_FRONTEND_DIR', WP_WOO_VS_PLUGIN_DIR . '/inc/Frontend');

/**
 * Plugin Initial Loading
 */
function wp_woo_vs_initial_loads()
{
	load_plugin_textdomain('variation-swatches-woocommerce', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'wp_woo_vs_initial_loads');

/**
 * Initialize all the core classes of the plugin
 */
if (class_exists('WP_WOO_VS\\Init')) {
	WP_WOO_VS\Init::registerServices();
}