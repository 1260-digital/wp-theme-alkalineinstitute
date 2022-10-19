<?php get_header(); ?>
<?php get_template_part('partials/module', 'header'); ?>

<section class="section section-default">
    <main class="container container-one-column">
        <div class="row">
            <article class="col-md-12">

                <header>
                    <h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'alkaline' ); ?></h1>
                </header>
                
                <p class="lead"><?php _e( 'It looks like nothing was found at this location.', 'alkaline' ); ?></p>
                
                <footer>
                    <a class="btn btn-lg btn-primary" href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'alkaline' ); ?></a>
                </footer>

            </article>
        </div>
    </main>
</section>

<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>