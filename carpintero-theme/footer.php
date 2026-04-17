<?php
/**
 * Pie de página: datos de contacto resumidos, enlaces legales, redes sociales.
 */
?>
<footer id="site-footer" class="site-footer" role="contentinfo">
    <div class="container footer-grid">
        <div class="footer-col">
            <p class="footer-brand"><?php bloginfo( 'name' ); ?></p>
            <p class="footer-tagline"><?php esc_html_e( 'Carpintería a medida: cocinas, armarios, baños y otros servicios.', 'carpintero' ); ?></p>
        </div>

        <div class="footer-col">
            <h3><?php esc_html_e( 'Contacto', 'carpintero' ); ?></h3>
            <ul>
                <li><a href="tel:+34609608289">+34 609 608 289</a></li>
                <li><a href="mailto:tomascocinas@hotmail.com">tomascocinas@hotmail.com</a></li>
                <li><?php esc_html_e( 'Taller: Molina de Segura', 'carpintero' ); ?></li>
                <li><?php esc_html_e( 'Zona: Murcia', 'carpintero' ); ?></li>
            </ul>
        </div>

        <div class="footer-col">
            <h3><?php esc_html_e( 'Secciones', 'carpintero' ); ?></h3>
            <ul>
                <?php
                $footer_links = array(
                    home_url( '/' )                => __( 'Inicio', 'carpintero' ),
                    home_url( '/cocinas' )          => __( 'Cocinas', 'carpintero' ),
                    home_url( '/armarios' )         => __( 'Armarios', 'carpintero' ),
                    home_url( '/banos' )            => __( 'Baños', 'carpintero' ),
                    home_url( '/otros-servicios' )  => __( 'Otros servicios', 'carpintero' ),
                    home_url( '/sobre-mi' )         => __( 'Sobre mí', 'carpintero' ),
                    home_url( '/contacto' )         => __( 'Contacto', 'carpintero' ),
                );
                foreach ( $footer_links as $url => $label ) :
                ?>
                    <li><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="footer-col">
            <h3><?php esc_html_e( 'Legal', 'carpintero' ); ?></h3>
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/aviso-legal' ) ); ?>"><?php esc_html_e( 'Aviso legal', 'carpintero' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/politica-privacidad' ) ); ?>"><?php esc_html_e( 'Política de privacidad', 'carpintero' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/politica-cookies' ) ); ?>"><?php esc_html_e( 'Política de cookies', 'carpintero' ); ?></a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <small>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Todos los derechos reservados.', 'carpintero' ); ?></small>
        </div>
    </div>
</footer>

<?php get_template_part( 'template-parts/components/cookies-banner' ); ?>

<?php wp_footer(); ?>
</body>
</html>
