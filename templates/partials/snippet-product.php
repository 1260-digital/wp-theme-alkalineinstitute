<div class="col-xs-12 col-sm-4 col-md-3 col-archive" style="margin-bottom:3em;">
            <a href="<?php the_permalink(); ?>">
                <!-- product primary image -->
            <?php 
            $image = get_field('primary_image');
            $size = 'full'; 
                if( $image ) { ?>
                    <?php echo wp_get_attachment_image( $image, $size, "", array( "class" => "img-responsive img-featured" ) ); ?>
            <?php } ?>
            </a>

             <!-- product title -->
                <?php if( get_field('product_title') ) : ?>
                    <h3><?php the_field('product_title'); ?></h3>
                <?php else: ?>
                    <h3><?php the_title(); ?></h3>
                <?php endif; ?>
                
                <!-- product price -->
                <?php if( get_field('product_sale') ): ?>
                    <?php if ( get_field( 'regular_price' ) ): ?>
                        <span class="price price-prev"><?php the_field('regular_price'); ?> <span class="currency"><?php _e( 'DKK', 'alkaline' ); ?></span></span>
                    <?php endif; ?>
                    <?php if ( get_field( 'sale_price' ) ): ?>
                        <span class="price price-current"><?php the_field('sale_price'); ?> <span class="currency"><?php _e( 'DKK', 'alkaline' ); ?></span></span>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if ( get_field( 'regular_price' ) ): ?>
                        <span class="price price-current"><?php the_field('regular_price'); ?> <span class="currency"><?php _e( 'DKK', 'alkaline' ); ?></span></span>
                    <?php endif; ?>
                <?php endif; ?>

              <br>
                <a class="btn btn-sm btn-primary" title="<?php the_field('product_title'); ?>" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'alkaline'); ?></a>

        </div>