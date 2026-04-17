<?php
/**
 * Banner de cookies (RGPD). Guarda la elección en localStorage.
 * Para cumplimiento completo en España se recomienda un plugin tipo Complianz,
 * Cookiebot o CookieYes — este banner es una base sencilla.
 */
?>
<div id="cookies-banner" class="cookies-banner" role="dialog" aria-live="polite" aria-label="<?php esc_attr_e( 'Aviso de cookies', 'carpintero' ); ?>" hidden>
    <div class="cookies-inner">
        <p>
            <?php
            printf(
                /* translators: %s: enlace a política de cookies */
                esc_html__( 'Usamos cookies para mejorar tu experiencia y analizar el tráfico. Puedes leer más en nuestra %s.', 'carpintero' ),
                '<a href="' . esc_url( home_url( '/politica-cookies' ) ) . '">' . esc_html__( 'política de cookies', 'carpintero' ) . '</a>'
            );
            ?>
        </p>
        <div class="cookies-actions">
            <button type="button" class="btn btn-outline" data-cookies="reject"><?php esc_html_e( 'Rechazar', 'carpintero' ); ?></button>
            <button type="button" class="btn btn-primary" data-cookies="accept"><?php esc_html_e( 'Aceptar', 'carpintero' ); ?></button>
        </div>
    </div>
</div>
