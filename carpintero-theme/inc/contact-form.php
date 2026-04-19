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

        <!-- Captcha: verificación humana -->
        <div class="field field-captcha">
            <?php
            $captcha_token = wp_create_nonce( 'carpintero_captcha' );
            ?>
            <input type="hidden" name="cf_captcha_token" value="<?php echo esc_attr( $captcha_token ); ?>">
            <label class="captcha-label">
                <input type="checkbox" name="cf_human" value="1" required>
                <span><?php esc_html_e( 'Soy humano', 'carpintero' ); ?></span>
            </label>
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

    // Rate limiting: máximo 5 envíos por IP por hora.
    $ip      = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : 'unknown';
    $rl_key  = 'carpintero_rl_' . md5( $ip );
    $rl_count = (int) get_transient( $rl_key );
    if ( $rl_count >= 5 ) {
        wp_safe_redirect( add_query_arg( 'error', 'limite', wp_get_referer() ) );
        exit;
    }
    set_transient( $rl_key, $rl_count + 1, HOUR_IN_SECONDS );

    // Captcha: verificar token y checkbox.
    $captcha_token = isset( $_POST['cf_captcha_token'] ) ? sanitize_text_field( wp_unslash( $_POST['cf_captcha_token'] ) ) : '';
    if ( ! wp_verify_nonce( $captcha_token, 'carpintero_captcha' ) || empty( $_POST['cf_human'] ) ) {
        wp_safe_redirect( add_query_arg( 'error', 'captcha', wp_get_referer() ) );
        exit;
    }

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

    $to      = 'tomas@cocinastomas.com';
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
