<?php
/**
 * Slider antes/después.
 * Se inicializa con el JS de /assets/js/before-after.js.
 */
?>
<div class="before-after" data-before-after>
    <div class="ba-image ba-before">
        <img src="<?php echo esc_url( CARPINTERO_URI . '/assets/images/before-after/mantenimiento/antes-1.jpg' ); ?>" alt="<?php esc_attr_e( 'Antes', 'carpintero' ); ?>" loading="lazy">
    </div>
    <div class="ba-image ba-after" data-ba-clip>
        <img src="<?php echo esc_url( CARPINTERO_URI . '/assets/images/before-after/mantenimiento/despues-1.jpg' ); ?>" alt="<?php esc_attr_e( 'Después', 'carpintero' ); ?>" loading="lazy">
    </div>
    <input
        type="range"
        class="ba-slider"
        min="0"
        max="100"
        value="50"
        aria-label="<?php esc_attr_e( 'Comparar antes y después', 'carpintero' ); ?>"
    >
    <span class="ba-label ba-label-before"><?php esc_html_e( 'Antes', 'carpintero' ); ?></span>
    <span class="ba-label ba-label-after"><?php esc_html_e( 'Después', 'carpintero' ); ?></span>
</div>
