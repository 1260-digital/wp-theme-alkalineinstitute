<?php get_header(); ?>
<?php get_template_part('partials/module', 'header'); ?>

    <section class="section section-default section-blog-post">
        <div class="container">
            <div class="row">

                <header class="col-md-12">
                        <?php
                            if ( is_home() ):
                                ?><?php
                            else:
                                the_archive_title( '<h1>', '</h1>' );
                            endif;
                            the_archive_description( '<div>', '</div>' );
                        ?>
                    </header>
                    
                <div class="col-md-8">

                    <?php
                        if ( function_exists('yoast_breadcrumb') ) :
                            yoast_breadcrumb('<div class="breadcrumb">','</div>');
                        endif;
                    ?>

                    <?php
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                            
                                 get_template_part('partials/module', 'post-excerpt'); 
                            endwhile;
                        endif;
                    ?>

                </div>

                <aside class="col-md-4">
                   <?php get_template_part('partials/module', 'post-sidebar'); ?>
               </aside>

            </div>
       </div>
    </section>


<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>