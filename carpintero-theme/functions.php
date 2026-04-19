<?php
/**
 * Carpintero Theme - functions.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'CARPINTERO_VERSION', '0.1.0' );
define( 'CARPINTERO_DIR', get_template_directory() );
define( 'CARPINTERO_URI', get_template_directory_uri() );

require_once CARPINTERO_DIR . '/inc/theme-setup.php';
require_once CARPINTERO_DIR . '/inc/enqueue.php';
require_once CARPINTERO_DIR . '/inc/cpt.php';
require_once CARPINTERO_DIR . '/inc/acf-fields.php';
require_once CARPINTERO_DIR . '/inc/seo-local.php';
require_once CARPINTERO_DIR . '/inc/contact-form.php';
require_once CARPINTERO_DIR . '/inc/accessibility.php';
require_once CARPINTERO_DIR . '/inc/helpers.php';
require_once CARPINTERO_DIR . '/inc/smtp.php';
