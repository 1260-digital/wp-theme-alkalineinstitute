<article class="post-single post-single-excerpt">
    <header>

        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        
        <?php if ( has_post_thumbnail() ) : ?>
                <figure>
                   <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail( 'large' ); ?></a>
                </figure>
        <?php endif; ?>

    </header>

    <?php get_template_part('partials/snippet', 'post-meta-header'); ?>
                            
    <?php the_excerpt(); ?>

    <a href="<?php the_permalink(); ?>"><?php _e( 'Read more...', 'alkaline' ); ?></a>

    <footer>
        <?php get_template_part('partials/snippet', 'post-meta-footer'); ?>  
    </footer>

</article>