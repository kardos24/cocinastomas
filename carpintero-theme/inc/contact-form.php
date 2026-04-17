<?php
/**
 * Formulario de contacto con envío por email.
 *
 * - Usa nonce + honeypot anti-spam.
 * - Valida servidor-side.
 * - Envía a la dirección configurada en admin (admin_email por defecto).
 * - Se renderiza llamando a carpintero_render_contact_form().
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function carpintero_render_contact_form() {
    ?>
    <form id="contact-form" class="contact-form" method="post" action="" novalidate>
        <?php wp_nonce_field( 'carpintero_contact', 'carpintero_contact_nonce' ); ?>

        <div class="field">
            <label for="cf-name"><?php esc_html_e( 'Nombre', 'carpintero' ); ?> <span aria-hidden="true">*</span></label>
            <input type="text" id="cf-name" name="cf_name" required autocomplete="name">
        </div>

        <div class="field">
            <label for="cf-email"><?php esc_html_e( 'Email', 'carpintero' ); ?> <span aria-hidden="true">*</span></label>
            <input type="email" id="cf-email" name="cf_email" required autocomplete="email">
        </div>

        <div class="field">
            <label for="cf-phone"><?php esc_html_e( 'Teléfono', 'carpintero' ); ?></label>
            <input type="tel" id="cf-phone" name="cf_phone" autocomplete="tel">
        </div>

        <div class="field">
            <label for="cf-service"><?php esc_html_e( 'Servicio', 'carpintero' ); ?></label>
            <select id="cf-service" name="cf_service">
                <option value=""><?php esc_html_e( 'Selecciona...', 'carpintero' ); ?></option>
                <option value="cocinas"><?php esc_html_e( 'Cocinas', 'carpintero' ); ?></option>
                <option value="armarios"><?php esc_html_e( 'Armarios', 'carpintero' ); ?></option>
                <option value="banos"><?php esc_html_e( 'Baños', 'carpintero' ); ?></option>
                <option value="mantenimiento"><?php esc_html_e( 'Otros servicios', 'carpintero' ); ?></option>
            </select>
        </div>

        <div class="field">
            <label for="cf-message"><?php esc_html_e( 'Mensaje', 'carpintero' ); ?> <span aria-hidden="true">*</span></label>
            <textarea id="cf-message" name="cf_message" rows="5" required></textarea>
        </div>

        <div class="field field-checkbox">
            <input type="checkbox" id="cf-rgpd" name="cf_rgpd" required>
            <label for="cf-rgpd">
                <?php printf(
                    /* translators: %s: enlace a política de privacidad */
                    esc_html__( 'He leído y acepto la %s.', 'carpintero' ),
                    '<a href="' . esc_url( home_url( '/politica-privacidad' ) ) . '" target="_blank" rel="noopener">' . esc_html__( 'política de privacidad', 'carpintero' ) . '</a>'
                ); ?>
            </label>
        </div>

        <!-- Honeypot: campo oculto que los bots rellenan -->
        <div class="honeypot" aria-hidden="true" style="position:absolute;left:-9999px;">
            <label for="cf-website">Website</label>
            <input type="text" id="cf-website" name="cf_website" tabindex="-1" autocomplete="off">
        </div>

        <button type="submit" class="btn btn-primary">
            <?php esc_html_e( 'Enviar', 'carpintero' ); ?>
        </button>

        <div class="form-response" role="status" aria-live="polite"></div>
    </form>
    <?php
}

// Handler en template_redirect (procesa el POST antes de renderizar).
add_action( 'template_redirect', 'carpintero_handle_contact_form' );
function carpintero_handle_contact_form() {
    if ( 'POST' !== $_SERVER['REQUEST_METHOD'] ) return;
    if ( empty( $_POST['carpintero_contact_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['carpintero_contact_nonce'], 'carpintero_contact' ) ) return;

    // Honeypot: si viene relleno, descartamos silenciosamente.
    if ( ! empty( $_POST['cf_website'] ) ) {
        wp_safe_redirect( add_query_arg( 'enviado', '1', wp_get_referer() ) );
        exit;
    }

    $name    = sanitize_text_field( $_POST['cf_name'] ?? '' );
    $email   = sanitize_email( $_POST['cf_email'] ?? '' );
    $phone   = sanitize_text_field( $_POST['cf_phone'] ?? '' );
    $service = sanitize_text_field( $_POST['cf_service'] ?? '' );
    $message = sanitize_textarea_field( $_POST['cf_message'] ?? '' );
    $rgpd    = ! empty( $_POST['cf_rgpd'] );

    if ( ! $name || ! is_email( $email ) || ! $message || ! $rgpd ) {
        wp_safe_redirect( add_query_arg( 'error', 'validacion', wp_get_referer() ) );
        exit;
    }

    $to      = get_option( 'admin_email' );
    $subject = sprintf( '[Web] Nuevo contacto - %s', $name );
    $body    = "Nombre: $name\nEmail: $email\nTeléfono: $phone\nServicio: $service\n\nMensaje:\n$message";
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        "Reply-To: $name <$email>",
    );

    $sent = wp_mail( $to, $subject, $body, $headers );

    wp_safe_redirect( add_query_arg( $sent ? array( 'enviado' => '1' ) : array( 'error' => 'envio' ), wp_get_referer() ) );
    exit;
}
