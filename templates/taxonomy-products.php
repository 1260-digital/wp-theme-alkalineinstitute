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
                            <hr>
                        </header>
                    <?php endif; ?>
        
        </div>
            <?php if ( have_posts() ) : ?>
                <div class="row">
                <?php $i = 1; while ( have_posts() ) : the_post(); ?>

                    
                        <?php get_template_part('partials/snippet', 'product'); ?>

                        <?php if ($i % 4 == 0) { echo '<div class="row visible-md visible-lg"></div>'; } ?>
                        <?php if ($i % 3 == 0) { echo '<div class="row visible-sm"></div>'; } ?>
                    

                <?php $i++; endwhile; ?>

                <?php the_posts_pagination( array( 'prev_text' => '<span class="screen-reader-text">' . __( 'Previous page', 'alkaline' ) . '</span>', 'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'alkaline' ) . '</span>', 'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'alkaline' ) . ' </span>' ) ); ?>
                </div>
            <?php endif; ?> 

        

    </div>
</div>

<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>