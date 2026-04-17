<?php
/**
 * Template Name: Sobre mí
 */
get_header(); ?>

<main id="main" class="site-main page-about" role="main">

    <section class="about-hero" data-reveal>
        <div class="container about-grid">
            <div class="about-image">
                <img src="<?php echo esc_url( CARPINTERO_URI . '/assets/images/bio/carpintero.jpg' ); ?>"
                     alt="<?php esc_attr_e( 'Tomás Cardos, maestro carpintero en Molina de Segura', 'carpintero' ); ?>"
                     loading="lazy">
            </div>
            <div class="about-text">
                <p class="eyebrow"><?php esc_html_e( 'Sobre mí', 'carpintero' ); ?></p>
                <h1><?php esc_html_e( 'Más de veinte años construyendo espacios con madera', 'carpintero' ); ?></h1>

                <p><?php esc_html_e( 'Me llamo Tomás Cardos. Nací en La Mancha y llevo décadas viviendo en Murcia, la tierra que me ha visto crecer profesionalmente. Empecé mi trayectoria en el mundo de la pintura, donde aprendí a leer los espacios, a entender las proporciones y a tratar cada trabajo con el cuidado que merece el interior de una casa. Con el tiempo, ese camino me llevó a la carpintería, concretamente al montaje de cocinas, y desde entonces no he parado.', 'carpintero' ); ?></p>

                <p><?php esc_html_e( 'Más de veinte años instalando cocinas a medida me han dado algo que no se aprende en ningún manual: saber escuchar lo que el cliente necesita antes de que termine de explicarlo. Cada hogar es distinto, cada familia tiene una forma diferente de usar su cocina, y mi trabajo empieza mucho antes de colocar la primera pieza. Empieza en la conversación, en la visita, en el diseño conjunto de una solución que se adapte exactamente a vuestro espacio y a vuestra vida.', 'carpintero' ); ?></p>

                <p><?php esc_html_e( 'Trabajo con seriedad y con las cosas claras. Los presupuestos son cerrados, los plazos se cumplen y la calidad no se negocia. Si tienes un proyecto de carpintería en mente, de la naturaleza que sea, estoy aquí para orientarte, ayudarte a definirlo y llevarlo a cabo con la profesionalidad que merece tu casa.', 'carpintero' ); ?></p>

                <ul class="about-stats">
                    <li><strong>+20</strong><span><?php esc_html_e( 'años de experiencia', 'carpintero' ); ?></span></li>
                    <li><strong>+500</strong><span><?php esc_html_e( 'proyectos realizados', 'carpintero' ); ?></span></li>
                    <li><strong>100%</strong><span><?php esc_html_e( 'trabajo a medida', 'carpintero' ); ?></span></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="about-values" data-reveal>
        <div class="container">
            <h2><?php esc_html_e( 'Mi forma de trabajar', 'carpintero' ); ?></h2>
            <div class="values-grid">
                <div class="value-item">
                    <h3><?php esc_html_e( 'Te oriento desde el principio', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Antes de hablar de precios o materiales, me siento contigo para entender qué necesitas. Te oriento sobre opciones, acabados y soluciones que quizás no habías considerado.', 'carpintero' ); ?></p>
                </div>
                <div class="value-item">
                    <h3><?php esc_html_e( 'Diseño adaptado a tu espacio', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Cada proyecto se diseña desde cero para el espacio concreto donde va a vivir. No hay soluciones genéricas: cada medida, cada módulo y cada detalle se piensa para ti.', 'carpintero' ); ?></p>
                </div>
                <div class="value-item">
                    <h3><?php esc_html_e( 'Presupuesto claro y cerrado', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Lo que acordamos es lo que pagas. Sin costes ocultos ni sorpresas al final de la obra. Si algo cambia durante el proceso, lo hablamos antes de ejecutarlo.', 'carpintero' ); ?></p>
                </div>
                <div class="value-item">
                    <h3><?php esc_html_e( 'Materiales y acabados de calidad', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Selecciono los materiales con criterio: madera maciza, tablero de alta densidad, herrajes de marcas contrastadas. La calidad de lo que se ve y de lo que no se ve.', 'carpintero' ); ?></p>
                </div>
                <div class="value-item">
                    <h3><?php esc_html_e( 'Plazos que se cumplen', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Me comprometo con una fecha y la respeto. Organizo el trabajo en taller y en obra para que la instalación se realice cuando se ha acordado, con las mínimas molestias.', 'carpintero' ); ?></p>
                </div>
                <div class="value-item">
                    <h3><?php esc_html_e( 'Disponible después de la entrega', 'carpintero' ); ?></h3>
                    <p><?php esc_html_e( 'Mi relación con el cliente no termina cuando se cierra la última puerta. Estoy disponible para cualquier ajuste, consulta o nuevo proyecto que pueda surgir.', 'carpintero' ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'template-parts/components/cta' ); ?>
</main>

<?php get_footer();
