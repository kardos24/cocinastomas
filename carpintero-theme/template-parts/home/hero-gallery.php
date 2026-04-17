<?php
/**
 * Hero a pantalla completa con galería/slider de imágenes.
 * Las imágenes se leen de assets/images/gallery/hero/ (lista hardcodeada, se
 * puede reemplazar por un repetidor ACF más adelante).
 */
?>
<section class="hero-gallery" aria-label="<?php esc_attr_e( 'Galería principal', 'carpintero' ); ?>">
    <div class="hero-slides">
        <?php
        $hero_images = array( '06.jpg', '05.jpg', '03.jpg', '04.jpg', '02.jpg', '01.jpg' );
        foreach ( $hero_images as $index => $img ) :
            $src = CARPINTERO_URI . '/assets/images/wp-gallery-ready/hero/' . $img;
        ?>
            <div class="hero-slide<?php echo 0 === $index ? ' is-active' : ''; ?>" style="background-image:url('<?php echo esc_url( $src ); ?>');" role="img" aria-label="<?php esc_attr_e( 'Trabajo destacado', 'carpintero' ); ?>"></div>
        <?php endforeach; ?>
    </div>

    <div class="hero-content container">
        <h1 class="hero-title"><?php esc_html_e( 'Carpintería artesanal a medida', 'carpintero' ); ?></h1>
        <p class="hero-subtitle"><?php esc_html_e( 'Cocinas, armarios, baños y otros servicios. Hechos con oficio, pensados para durar.', 'carpintero' ); ?></p>
        <a href="#servicios" class="btn btn-primary"><?php esc_html_e( 'Descubre nuestro trabajo', 'carpintero' ); ?></a>
    </div>

    <button class="hero-scroll-indicator" aria-label="<?php esc_attr_e( 'Bajar a servicios', 'carpintero' ); ?>" data-scroll-to="#servicios">
        <svg viewBox="0 0 24 24" width="24" height="24" aria-hidden="true"><path fill="currentColor" d="M7 10l5 5 5-5z"/></svg>
    </button>
</section>
