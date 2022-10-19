<?php if ( get_field( 'hide_footer') == false ) : ?>
    <footer class="section section-footer section-default">
        <div class="container container-footer">
            
            <?php if ( get_field( 'footer_column_one', 'options' ) || get_field('footer_column_two', 'options' ) || get_field( 'footer_column_three', 'options' ) ): ?>
                <div class="row row-colophon">
                    <div class="col-md-4">
                        <?php the_field( 'footer_column_one', 'options' ); ?>
                    </div>
                    <div class="col-md-4">
                        <?php the_field( 'footer_column_two', 'options' ); ?>
                    </div>
                    <div class="col-md-4">
                        <?php the_field( 'footer_column_three', 'options' ); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row row-copyright">
                <div class="col-md-12 small">
                    Alkaline Institute <?php _e('Copyright © ', 'alkaline'); ?> <?php echo date('Y'); ?> - All rights reserved
                </div>
            </div>

        </div>
    </footer>
<?php endif; ?>