<?php
/**
 * 404 - Página no encontrada
 */
get_header(); ?>

<main id="main" class="site-main page-404" role="main">
    <div class="container text-center">
        <h1>404</h1>
        <p><?php esc_html_e( 'La página que buscas no existe o ha sido movida.', 'carpintero' ); ?></p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
            <?php esc_html_e( 'Volver al inicio', 'carpintero' ); ?>
        </a>
    </div>
</main>

<?php get_footer();
