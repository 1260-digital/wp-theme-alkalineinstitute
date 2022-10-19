<?php get_header(); ?>
<?php get_template_part('partials/module', 'header'); ?>

<div class="section section-default">
    <div class="container"> 
        <div class="row">

            <?php if ( have_posts() ) : ?>
                <header class="col-md-12">
                    <?php
                        the_archive_title( '<h1>', '</h1>' );
                        the_archive_description( '<div class="lead">', '</div>' );
                    ?>
                </header>
            <?php endif; ?>

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part('partials/snippet', 'product'); ?>
                <?php endwhile; ?>

                <?php the_posts_pagination( array( 'prev_text' => '<span class="screen-reader-text">' . __( 'Previous page', 'alkaline' ) . '</span>', 'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'alkaline' ) . '</span>', 'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'alkaline' ) . ' </span>' ) ); ?>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>