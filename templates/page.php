<?php get_header(); ?>
<?php get_template_part('partials/module', 'header'); ?>






<?php if( have_rows('sections') ): ?>


    <?php while ( have_rows('sections') ) : the_row(); ?>

        <?php
            // vars
            $background_color = get_sub_field( 'background_color' );
            $background_effects = get_sub_field( 'background_effects' );
            $background_image = get_sub_field( 'background_image' );
            $background_image_size = 'large';
        ?>
    

        <section class="section <?php echo $background_color; ?> <?php echo $background_effects; ?> <?php if ( $background_image ) : ?>section-image<?php endif; ?>" <?php if ( $background_image ) : ?> style="background-image: url( '<?php echo wp_get_attachment_image_src( $background_image, $background_image_size )[0]; ?>'); " <?php endif; ?>>
            <div class="container">

        
        <?php if( have_rows('module') ) : ?>

        <?php while ( have_rows('module') ) : the_row(); ?>

            <?php if( get_row_layout() == 'module_1_column' ): ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php the_sub_field( 'column' ); ?>
                    </div>
                </div>

            <?php elseif( get_row_layout() == 'module_2_columns' ):  ?>

                <?php 
                    // vars
                    if ( get_sub_field( 'column_layout' ) == 'layout-default' ) :
                        $column_layout_left = 'col-md-6';
                        $column_layout_right = 'col-md-6';
                    elseif ( get_sub_field( 'column_layout' ) == 'one-third-default' ) :
                        $column_layout_left = 'col-md-4';
                        $column_layout_right = 'col-md-8';
                    elseif ( get_sub_field( 'column_layout' ) == 'two-third-default' ) :
                        $column_layout_left = 'col-md-8';
                        $column_layout_right = 'col-md-4';
                    endif;
                ?>

                <div class="row">
                    <div class="<?php echo $column_layout_left; ?>">
                        <?php the_sub_field( 'column_left' ); ?>
                    </div>
                    <div class="<?php echo $column_layout_right; ?>">
                        <?php the_sub_field( 'column_right' ); ?>
                    </div>
                </div>

            <?php elseif( get_row_layout() == 'module_2_columns_newsletter' ):  ?>

                <?php 
                    // vars
                    if ( get_sub_field( 'column_layout' ) == 'layout-default' ) :
                        $column_layout_left = 'col-md-6';
                        $column_layout_right = 'col-md-6';
                    elseif ( get_sub_field( 'column_layout' ) == 'one-third-default' ) :
                        $column_layout_left = 'col-md-4';
                        $column_layout_right = 'col-md-8';
                    elseif ( get_sub_field( 'column_layout' ) == 'two-third-default' ) :
                        $column_layout_left = 'col-md-8';
                        $column_layout_right = 'col-md-4';
                    endif;
                ?>

                <div class="row">
                    <div class="<?php echo $column_layout_left; ?>">
                        <?php the_sub_field( 'column_left' ); ?>
                    </div>
                    <div class="<?php echo $column_layout_right; ?>">
                        <?php the_sub_field( 'column_right' ); ?>

                  <h2><?php the_sub_field( 'form_title' ); ?></h2>
                <h3><?php the_sub_field( 'form_subtitle' ); ?></h3>
                <br>

                <?php if ( get_sub_field( 'form_type' ) == 'inline' ) : ?>
                
                    <?php if ( get_sub_field( 'form_html' ) ) :?>
                        <form action="<?php the_sub_field( 'form_html' ); ?>" method="post">
                          <div class="form-group"><input class="form-control input-lg" type="text" name="customer[first_names]" required placeholder="<?php echo esc_attr_x( 'First name ', 'alkaline' ); ?>"></div>
                          <div class="form-group"><input class="form-control input-lg" type="email" name="email" required placeholder="<?php echo esc_attr_x( 'E-mail ', 'alkaline' ); ?>"></div>
                          <input class="btn btn-lg btn-block btn-primary" name="submit" value="<?php if ( get_sub_field( 'form_button' ) ) : the_sub_field( 'form_button' ); else: ?> <?php echo esc_attr_x( 'Submit ', 'alkaline' ); ?> <?php endif; ?>" type="submit">
                        </form>
                        <?php if ( get_sub_field( 'form_html' ) ) :?>
                            <br><small><?php the_sub_field( 'form_disclaimer' ); ?></small>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php echo _e( 'Remember to provide an action-url to generate the form', 'alkaline' ); ?>
                    <?php endif; ?>

                <?php elseif ( get_sub_field( 'form_type' ) == 'modal' ) : ?>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                      <?php the_sub_field( 'modal_button' ); ?>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                                <?php the_sub_field( 'modal_content' ); ?>
                                <?php if ( get_sub_field( 'form_html' ) ) :?>
                                    <form action="<?php the_sub_field( 'form_html' ); ?>" method="post">
                                      <div class="form-group">
                                        <input class="form-control input-lg" type="text" name="customer[first_names]" required placeholder="<?php echo esc_attr_x( 'First name ', 'alkaline' ); ?>">
                                    </div>
                                      <div class="form-group">
                                        <input class="form-control input-lg" type="email" name="email" required placeholder="<?php echo esc_attr_x( 'E-mail ', 'alkaline' ); ?>">
                                    </div>
                                      <input class="btn btn-lg btn-block btn-primary" name="submit" value="<?php if ( get_sub_field( 'form_button' ) ) : the_sub_field( 'form_button' ); else: echo esc_attr_x( 'Submit ', 'alkaline' ); endif; ?>" type="submit">
                                    </form>
                                    <?php if ( get_sub_field( 'form_html' ) ) :?>
                                        <br><small><?php the_sub_field( 'form_disclaimer' ); ?><br><a href="#" data-dismiss="modal" aria-label="Close"><?php echo esc_attr_x( 'Close Box', 'alkaline' ); ?></a></small>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php echo _e( 'Remember to provide an action-url to generate the form', 'alkaline' ); ?> 
                                <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>

                    </div>
                </div>

            <?php elseif( get_row_layout() == 'module_3_columns' ):  ?>
                
                <div class="row">
                    <div class="col-md-4">
                        <?php the_sub_field( 'column_left' ); ?>
                    </div>
                    <div class="col-md-4">
                        <?php the_sub_field( 'column_middle' ); ?>
                    </div>
                    <div class="col-md-4">
                        <?php the_sub_field( 'column_right' ); ?>
                    </div>
                </div>


            <?php elseif( get_row_layout() == 'module_newsletter' ):  ?>

                <?php get_template_part('partials/snippet', 'form-fields'); ?>

            <?php endif;  ?>

          <?php endwhile;  ?>

      <?php else :  ?>

      <?php endif; ?>

        </div>
    </section>

    <?php endwhile; ?>

<?php else : ?>



<?php endif; ?>



<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>
