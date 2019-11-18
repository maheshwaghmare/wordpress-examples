<?php
/**
 * Plugin Name: WordPress Examples
 * Plugin URI: https://maheshwaghmare.com/
 * Description: WordPress Examples
 * Version: 1.0.0
 * Author: Mahesh Waghmare
 * Author URI: https://maheshwaghmare.com/
 * Text Domain: wordpress-examples
 *
 * @package WordPress Examples
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Set Constants.	
define( 'WORDPRESS_EXAMPLES_VER', '1.0.0' );
define( 'WORDPRESS_EXAMPLES_FILE', __FILE__ );
define( 'WORDPRESS_EXAMPLES_BASE', plugin_basename( WORDPRESS_EXAMPLES_FILE ) );
define( 'WORDPRESS_EXAMPLES_DIR', plugin_dir_path( WORDPRESS_EXAMPLES_FILE ) );
define( 'WORDPRESS_EXAMPLES_URI', plugins_url( '/', WORDPRESS_EXAMPLES_FILE ) );

require_once WORDPRESS_EXAMPLES_DIR . 'classes/class-wordpress-examples.php';