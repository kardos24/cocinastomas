<?php
/**
 * Sección de servicios: 4 bloques (cocinas, armarios, baños, mantenimiento).
 */
$services = array(
    array(
        'slug'  => 'cocinas',
        'title' => __( 'Cocinas', 'carpintero' ),
        'text'  => __( 'Diseño, fabricación e instalación de cocinas a medida.', 'carpintero' ),
        'img'   => 'home/cocina-destacada.jpg',
    ),
    array(
        'slug'  => 'armarios',
        'title' => __( 'Armarios', 'carpintero' ),
        'text'  => __( 'Empotrados, vestidores y correderas al milímetro.', 'carpintero' ),
        'img'   => 'home/armario-destacado.jpg',
    ),
    array(
        'slug'  => 'banos',
        'title' => __( 'Baños', 'carpintero' ),
        'text'  => __( 'Muebles de baño resistentes y elegantes.', 'carpintero' ),
        'img'   => 'home/bano-destacado.jpg',
    ),
    array(
        'slug'  => 'otros-servicios',
        'title' => __( 'Otros servicios', 'carpintero' ),
        'text'  => __( 'Reparación, restauración, ajustes y más.', 'carpintero' ),
        'img'   => 'home/mantenimiento-destacado.jpg',
    ),
);
?>
<section id="servicios" class="home-services">
    <div class="container">
        <header class="section-header" data-reveal>
            <p class="eyebrow"><?php esc_html_e( 'Qué hacemos', 'carpintero' ); ?></p>
            <h2><?php esc_html_e( 'Servicios', 'carpintero' ); ?></h2>
        </header>

        <div class="services-grid">
            <?php foreach ( $services as $s ) : ?>
                <a class="service-card" href="<?php echo esc_url( home_url( '/' . $s['slug'] ) ); ?>" data-reveal>
                    <div class="service-card-image" style="background-image:url('<?php echo esc_url( CARPINTERO_URI . '/assets/images/' . $s['img'] ); ?>');"></div>
                    <div class="service-card-body">
                        <h3><?php echo esc_html( $s['title'] ); ?></h3>
                        <p><?php echo esc_html( $s['text'] ); ?></p>
                        <span class="service-card-arrow" aria-hidden="true">&rarr;</span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
