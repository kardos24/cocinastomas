<?php
/**
 * Fallback genérico. WordPress lo usa si no encuentra una plantilla más específica.
 */
get_header(); ?>

<main id="main" class="site-main" role="main">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-content"><?php the_content(); ?></div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e( 'No se ha encontrado contenido.', 'carpintero' ); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer();
