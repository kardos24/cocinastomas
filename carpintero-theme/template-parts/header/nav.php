<?php
/**
 * Navegación principal con logo.
 */
?>
<nav class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Menú principal', 'carpintero' ); ?>">
    <div class="container main-nav-inner">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="<?php esc_attr_e( 'Ir al inicio', 'carpintero' ); ?>">
            <?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
                <img src="<?php echo esc_url( CARPINTERO_URI . '/assets/images/logo/logo-horizontal.png' ); ?>" alt="<?php esc_attr_e( 'Cocinas Tomás', 'carpintero' ); ?>">
            <?php endif; ?>
        </a>

        <button class="nav-toggle" aria-expanded="false" aria-controls="primary-menu" aria-label="<?php esc_attr_e( 'Abrir menú', 'carpintero' ); ?>">
            <span></span><span></span><span></span>
        </button>

        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_id'        => 'primary-menu',
            'menu_class'     => 'primary-menu',
            'container'      => false,
            'fallback_cb'    => 'carpintero_nav_fallback',
        ) );
        ?>
    </div>
</nav>
<?php
function carpintero_nav_fallback() {
    echo '<ul id="primary-menu" class="primary-menu">';
    $items = array(
        '/'               => __( 'Inicio', 'carpintero' ),
        '/cocinas'        => __( 'Cocinas', 'carpintero' ),
        '/armarios'       => __( 'Armarios', 'carpintero' ),
        '/banos'          => __( 'Baños', 'carpintero' ),
        '/otros-servicios'  => __( 'Otros servicios', 'carpintero' ),
        '/sobre-mi'       => __( 'Sobre mí', 'carpintero' ),
        '/contacto'       => __( 'Contacto', 'carpintero' ),
    );
    foreach ( $items as $path => $label ) {
        printf(
            '<li><a href="%s">%s</a></li>',
            esc_url( home_url( $path ) ),
            esc_html( $label )
        );
    }
    echo '</ul>';
}
