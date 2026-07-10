<?php
/**
 * Plugin Name: Membership Payment Gateway
 * Plugin URI: https://example.com
 * Description: Standalone Membership Payment Gateway using PayU without WooCommerce.
 * Version: 1.0.0
 * Author: Mayank Agrawal
 * Requires PHP: 8.0
 * Requires at least: 6.0
 * Text Domain: membership-payment
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

define('MPG_VERSION', '1.0.0');
define('MPG_FILE', __FILE__);
define('MPG_PATH', plugin_dir_path(__FILE__));
define('MPG_URL', plugin_dir_url(__FILE__));

require_once MPG_PATH . 'includes/class-plugin.php';

MPG_Plugin::instance();
