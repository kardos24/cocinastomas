<?php
/**
 * Configuración SMTP para wp_mail().
 * Servidor: cp7181.webempresa.eu, puerto 25, sin SSL, autenticación requerida.
 *
 * La contraseña se lee de la constante CARPINTERO_SMTP_PASS definida en wp-config.php:
 *   define( 'CARPINTERO_SMTP_PASS', 'tu_contraseña_aqui' );
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'phpmailer_init', 'carpintero_smtp_config' );
function carpintero_smtp_config( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = 'cp7181.webempresa.eu';
    $phpmailer->Port       = 587;
    $phpmailer->SMTPAuth   = true;
    $phpmailer->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $phpmailer->Username   = 'tomas@cocinastomas.com';
    $phpmailer->Password   = defined( 'CARPINTERO_SMTP_PASS' ) ? CARPINTERO_SMTP_PASS : '';
    $phpmailer->From       = 'tomas@cocinastomas.com';
    $phpmailer->FromName   = 'Cocinas Tomás';
}

add_filter( 'wp_mail_from',      fn() => 'tomas@cocinastomas.com' );
add_filter( 'wp_mail_from_name', fn() => 'Cocinas Tomás' );
