<?php if( have_rows('sidebar', 'options') ): ?>
  <?php while ( have_rows('sidebar', 'options') ) : the_row(); ?>

        <?php if( get_row_layout() == 'sidebar_form' ): ?>

          <div class="sidebar-item sidebar-item-light sidebar-item-form">
            <p class="h2"><?php the_sub_field('title'); ?></p>
            <p class="lead"><?php the_sub_field('intro'); ?></p>
            <form action="<?php the_sub_field('action'); ?>" method="post">
              <div class="form-group">
                <input class="form-control input-lg" type="text" name="customer[first_names]" required="" placeholder="First name ">
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="email" name="email" required="" placeholder="E-mail ">
              </div>
              <input class="btn btn-lg btn-block btn-primary" name="submit" value="<?php the_sub_field('button'); ?> " type="submit">
            </form>
          </div>

        <?php elseif( get_row_layout() == 'sidebar_product' ):  ?>

          <div class="sidebar-item sidebar-item-product">
            <p class="h3"><?php the_sub_field('title'); ?></p>
            <a href="<?php the_sub_field('url'); ?>">
              <img src="<?php the_sub_field('image'); ?>"  class="img-responsive">
            </a>
            <a href="<?php the_sub_field('url'); ?>" class="btn btn-primary"><?php the_sub_field('button'); ?></a>
          </div>

      <?php elseif( get_row_layout() == 'sidebar_posts' ):  ?>

          <div class="sidebar-item sidebar-item-posts">
          <?php 
            // vars
            $args = array(
                'posts_per_page'   => 8,
                'post_type'     => 'post',
                'order'             => 'DESC'
            );
            $query = new WP_Query( $args );?>

          <?php if( $query->have_posts() ): ?>

            <div class="row">
              <div class="col-md-12">
                <p class="h3"><?php the_sub_field('title'); ?></p>
              </div>
            </div>
            <div class="post-thumbnail-list">
                                      <?php while( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="post-thumbnail">
                      <a href="<?php the_permalink(); ?>">
                      <?php echo get_the_post_thumbnail( get_the_id(), 'thumbnail', array( 'class' => 'img-responsive' ) ); ?>
                       
                      </a>

                    </div>
                                      <?php endwhile; ?>
                                      </div>
                                  <?php endif; wp_reset_query(); ?>
          </div>

      <?php elseif( get_row_layout() == 'sidebar_content' ):  ?>

        <div class="sidebar-item sidebar-item-about">
          <div class="row">
            <div class="col-md-12">
              <?php the_sub_field('content'); ?>
            </div>
          </div>
        </div>

        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>









