<?php
/**
 * Template Name: Otros servicios
 */
get_header(); ?>

<main id="main" class="site-main page-service page-otros-servicios" role="main">

    <section class="service-hero" data-reveal>
        <div class="container">
            <p class="service-hero__category"><?php esc_html_e( 'Otros servicios', 'carpintero' ); ?></p>
            <div class="service-hero__rule" aria-hidden="true"></div>
            <h1><?php esc_html_e( 'Carpintería a medida para cada rincón de tu espacio', 'carpintero' ); ?></h1>
            <p class="lead"><?php esc_html_e( 'Más allá de cocinas, armarios y baños, la madera tiene presencia en cada parte del hogar. Diseñamos, fabricamos e instalamos cualquier obra de carpintería con la misma exigencia artesanal.', 'carpintero' ); ?></p>
        </div>
    </section>

    <section class="service-gallery" data-reveal>
        <div class="container">
            <?php get_template_part( 'template-parts/components/gallery', null, array( 'category' => 'mantenimiento' ) ); ?>
        </div>
    </section>

    <section class="service-features" data-reveal>
        <div class="container">
            <h2><?php esc_html_e( '¿Qué podemos hacer por ti?', 'carpintero' ); ?></h2>
            <div class="feature-cards">
                <div class="feature-card">
                    <h3><?php esc_html_e( 'Puertas y ventanas a medida', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Fabricación e instalación de puertas de interior y exterior, ventanas y marcos en madera maciza o DM lacado. Adaptadas al hueco existente y al estilo de cada espacio.', 'carpintero' ); ?></p>
                </div>
                <div class="feature-card">
                    <h3><?php esc_html_e( 'Mobiliario a medida', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Mesas de comedor y escritorio, librerías, estanterías, aparadores, cabeceros y cualquier mueble que imagines. Cada pieza se diseña desde cero para encajar perfectamente en tu espacio.', 'carpintero' ); ?></p>
                </div>
                <div class="feature-card">
                    <h3><?php esc_html_e( 'Tarimas y suelos de madera', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Instalación de tarima maciza, laminada o flotante. Incluye preparación del suelo, rodapiés y acabado final. También lijado y barnizado de tarimas existentes para devolverles su aspecto original.', 'carpintero' ); ?></p>
                </div>
                <div class="feature-card">
                    <h3><?php esc_html_e( 'Escaleras de madera', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Diseño y construcción de escaleras interiores: peldaños, barandillas y pasamanos a medida. Posibilidad de forrar escaleras existentes para renovar su aspecto sin obra.', 'carpintero' ); ?></p>
                </div>
                <div class="feature-card">
                    <h3><?php esc_html_e( 'Revestimientos murales', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Paneles de madera para paredes y techos, vigas decorativas, molduras y zócalos. Una solución elegante para dar calidez y carácter a salones, dormitorios u oficinas.', 'carpintero' ); ?></p>
                </div>
                <div class="feature-card">
                    <h3><?php esc_html_e( 'Pérgolas y carpintería exterior', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Pérgolas, porches, cerramientos y estructuras de madera para jardín o terraza. Tratamiento previo con productos específicos para exteriores que garantizan durabilidad frente a la intemperie.', 'carpintero' ); ?></p>
                </div>
                <div class="feature-card">
                    <h3><?php esc_html_e( 'Restauración de muebles', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Recuperación de muebles con valor sentimental o histórico: desmontaje, limpieza, reparación de estructuras, lijado y aplicación de nuevo acabado respetando el estilo original.', 'carpintero' ); ?></p>
                </div>
                <div class="feature-card">
                    <h3><?php esc_html_e( 'Reparaciones y mantenimiento', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Ajuste de puertas y cajones, cambio de herrajes, reparación de bisagras, barnizado puntual y cualquier intervención de mantenimiento para prolongar la vida útil de tus muebles y carpinterías.', 'carpintero' ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="service-process" data-reveal>
        <div class="container">
            <h2><?php esc_html_e( 'Nuestro proceso de trabajo', 'carpintero' ); ?></h2>
            <ol class="process-steps">
                <li>
                    <span class="step-number">01</span>
                    <div>
                        <h3><?php esc_html_e( 'Visita y toma de medidas', 'carpintero' ); ?></h3>
                        <p><?php esc_html_e( 'Nos desplazamos a tu domicilio para conocer el espacio, escuchar tus necesidades y tomar medidas con precisión.', 'carpintero' ); ?></p>
                    </div>
                </li>
                <li>
                    <span class="step-number">02</span>
                    <div>
                        <h3><?php esc_html_e( 'Diseño y propuesta', 'carpintero' ); ?></h3>
                        <p><?php esc_html_e( 'Elaboramos un diseño detallado con materiales, acabados y presupuesto cerrado. Sin sorpresas.', 'carpintero' ); ?></p>
                    </div>
                </li>
                <li>
                    <span class="step-number">03</span>
                    <div>
                        <h3><?php esc_html_e( 'Fabricación en taller', 'carpintero' ); ?></h3>
                        <p><?php esc_html_e( 'Fabricamos cada pieza en nuestro taller de Molina de Segura con maquinaria de precisión y materiales de primera calidad.', 'carpintero' ); ?></p>
                    </div>
                </li>
                <li>
                    <span class="step-number">04</span>
                    <div>
                        <h3><?php esc_html_e( 'Instalación y entrega', 'carpintero' ); ?></h3>
                        <p><?php esc_html_e( 'Instalamos con cuidado, dejamos el espacio recogido y nos aseguramos de que el resultado cumple exactamente lo acordado.', 'carpintero' ); ?></p>
                    </div>
                </li>
            </ol>
        </div>
    </section>

    <?php get_template_part( 'template-parts/components/cta' ); ?>
</main>

<?php get_footer();
