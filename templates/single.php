<?php get_header(); ?>
<?php get_template_part('partials/module', 'header'); ?>

    <section class="section section-default section-blog-post">
        <div class="container">
            <div class="row">
                <article class="col-md-8">
                    <?php get_template_part('partials/module', 'post-single'); ?>
                </article>
                <aside class="col-md-4">
                   <?php get_template_part('partials/module', 'post-sidebar'); ?>
               </aside>
            </div>
       </div>
    </section>

<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>