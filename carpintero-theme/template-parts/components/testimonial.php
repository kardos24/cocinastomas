<?php
/**
 * Testimonio individual.
 * @param array $args ['quote', 'author', 'role']
 */
$args   = $args ?? array();
$quote  = $args['quote']  ?? '';
$author = $args['author'] ?? '';
$role   = $args['role']   ?? '';
?>
<figure class="testimonial">
    <blockquote><p><?php echo esc_html( $quote ); ?></p></blockquote>
    <figcaption>
        <strong><?php echo esc_html( $author ); ?></strong>
        <?php if ( $role ) : ?><span><?php echo esc_html( $role ); ?></span><?php endif; ?>
    </figcaption>
</figure>
