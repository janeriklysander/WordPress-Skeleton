<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if (has_post_thumbnail()):
        printf('<figure>%s</figure>',
            get_the_post_thumbnail()
        );
    endif;
    ?>
    <div class="content">
        <?php the_content(); ?>
    </div>
</article>
