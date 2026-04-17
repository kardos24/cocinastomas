<?php
/**
 * Galería con slider: imagen principal grande + tira de miniaturas.
 *
 * @param array $args ['category' => 'cocinas']
 */
$args     = $args ?? array();
$category = $args['category'] ?? '';

$projects = $category ? carpintero_get_projects( $category ) : array();

$static_counts = array(
    'cocinas'       => 10,
    'armarios'      => 10,
    'banos'         => 10,
    'mantenimiento' => 7,
);
$static_alt = array(
    'cocinas'       => __( 'Cocina a medida', 'carpintero' ),
    'armarios'      => __( 'Armario a medida', 'carpintero' ),
    'banos'         => __( 'Baño a medida', 'carpintero' ),
    'mantenimiento' => __( 'Otros servicios', 'carpintero' ),
);

// Construir lista de imágenes [{src, alt}]
$images = array();

if ( ! empty( $projects ) ) {
    foreach ( $projects as $project ) {
        $thumb = get_the_post_thumbnail_url( $project, 'carpintero-gallery' );
        if ( $thumb ) {
            $images[] = array( 'src' => $thumb, 'alt' => get_the_title( $project ) );
        }
    }
} elseif ( isset( $static_counts[ $category ] ) ) {
    $count = $static_counts[ $category ];
    $alt   = $static_alt[ $category ];
    for ( $i = 1; $i <= $count; $i++ ) {
        $images[] = array(
            'src' => CARPINTERO_URI . '/assets/images/optimized/' . $category . '/' . sprintf( '%02d.jpg', $i ),
            'alt' => $alt . ' ' . $i,
        );
    }
}

if ( empty( $images ) ) : ?>
    <p class="gallery-empty">
        <?php esc_html_e( 'Aún no hay proyectos publicados en esta categoría.', 'carpintero' ); ?>
    </p>
<?php return; endif; ?>

<div class="photo-slider" data-slider>

    <div class="slider-stage">
        <button class="slider-btn slider-prev" aria-label="<?php esc_attr_e( 'Foto anterior', 'carpintero' ); ?>">
            <svg viewBox="0 0 24 24" width="28" height="28" aria-hidden="true">
                <path fill="currentColor" d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
            </svg>
        </button>

        <div class="slider-viewport">
            <img class="slider-main-img"
                 src="<?php echo esc_url( $images[0]['src'] ); ?>"
                 alt="<?php echo esc_attr( $images[0]['alt'] ); ?>"
                 loading="eager">
        </div>

        <button class="slider-btn slider-next" aria-label="<?php esc_attr_e( 'Foto siguiente', 'carpintero' ); ?>">
            <svg viewBox="0 0 24 24" width="28" height="28" aria-hidden="true">
                <path fill="currentColor" d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
            </svg>
        </button>
    </div>

    <div class="slider-thumbs-wrap">
        <?php foreach ( $images as $idx => $img ) : ?>
            <button
                class="slider-thumb<?php echo $idx === 0 ? ' is-active' : ''; ?>"
                data-idx="<?php echo $idx; ?>"
                data-src="<?php echo esc_url( $img['src'] ); ?>"
                data-alt="<?php echo esc_attr( $img['alt'] ); ?>"
                aria-label="<?php printf( esc_attr__( 'Ver foto %d', 'carpintero' ), $idx + 1 ); ?>"
                aria-pressed="<?php echo $idx === 0 ? 'true' : 'false'; ?>">
                <img src="<?php echo esc_url( $img['src'] ); ?>"
                     alt=""
                     loading="lazy">
            </button>
        <?php endforeach; ?>
    </div>

</div>
