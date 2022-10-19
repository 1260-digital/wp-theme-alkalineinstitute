<h2><?php the_sub_field( 'form_title' ); ?></h2>
                <h3><?php the_sub_field( 'form_subtitle' ); ?></h3>
                <br>

                <?php if ( get_sub_field( 'form_type' ) == 'inline' ) : ?>
                
                    <?php if ( get_sub_field( 'form_html' ) ) :?>
                        <form class="form-inline" action="<?php the_sub_field( 'form_html' ); ?>" method="post">
                          <input class="form-control input-lg" type="text" name="customer[first_names]" required placeholder="<?php echo esc_attr_x( 'First name ', 'alkaline' ); ?>">
                          <input class="form-control input-lg" type="email" name="email" required placeholder="<?php echo esc_attr_x( 'E-mail ', 'alkaline' ); ?>">
                          <input class="btn btn-lg btn-primary" name="submit" value="<?php if ( get_sub_field( 'form_button' ) ) : the_sub_field( 'form_button' ); else: ?> <?php echo esc_attr_x( 'Submit ', 'alkaline' ); ?> <?php endif; ?>" type="submit">
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
                                      <input class="btn btn-lg btn-block btn-primary" name="submit" value="<?php if ( get_sub_field( 'form_button_text' ) ) : the_sub_field( 'form_button_text' ); else: echo esc_attr_x( 'Submit ', 'alkaline' ); endif; ?>" type="submit">
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