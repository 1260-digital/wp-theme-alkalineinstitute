<?php get_header(); ?>
<?php get_template_part('partials/module', 'header'); ?>

    
<div class="section section-default">
<div class="container"> 

    <div class="row">
        <div class="col-xs-12 col-sm-5 col-md-5">

            <!-- product primary image -->
            <?php 
            $image = get_field('primary_image');
            $size = 'full'; 
                if( $image ) { ?>
                    <?php echo wp_get_attachment_image( $image, $size, "", array( "class" => "img-responsive img-featured" ) ); ?>
            <?php } ?>

            <!-- product gallery -->
            <?php 
                $images = get_field('gallery');
                if( $images ): ?>
                        <div class="row">
                        <?php foreach( $images as $image ): ?>
                             <div class="col-xs-4">
                                <a href="<?php echo $image['url']; ?>">
                                     <img class="img-thumbnail" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                                </a>
                                </div>
                                
                            
                        <?php endforeach; ?>
                        </div>
                <?php endif; ?>

        </div>
        <div class="col-xs-12 col-sm-7 col-md-7">
                    
                <!-- product category -->
                <?php $terms = get_the_terms( $post->ID , 'product-categories' ); 
                if ( $terms ) : 
                    foreach ( $terms as $term ) {
                        $term_link = get_term_link( $term, 'product-categories' );
                        echo 'Kategori: ';
                        if( is_wp_error( $term_link ) )
                        continue;
                    echo '<a href="' . $term_link . '">' . $term->name . '</a>';
                    }
                    endif; 
                ?>

                <!-- product title -->
                <?php if( get_field('product_title') ) : ?>
                    <h1><?php the_field('product_title'); ?></h1>
                <?php else: ?>
                    <h1><?php the_title(); ?></h1>
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
                
                <!-- product intro -->
                <?php if( get_field('short_description') ) : ?>
                    <hr>
                    <p class="lead"><?php the_field('short_description', false, false); ?></p>
                <?php endif; ?>

                <!-- product sales button -->
                <?php if( get_field('sales_link') ): ?>
                   <a class="btn btn-lg btn-primary" title="<?php the_field('product_title'); ?>" target="_blank" href="<?php the_field('sales_link'); ?>"><?php _e('Buy here', 'alkaline'); ?></a>
                   <br><br>
                   <p><b><?php _e('Questions?', 'alkaline'); ?></b> <?php _e('Call now on +45 21 48 95 06', 'alkaline'); ?></p>
                <?php else: ?>
                   <p><b><?php _e('Questions?', 'alkaline'); ?></b> <?php _e('Call now on +45 21 48 95 06', 'alkaline'); ?></p>
                <?php endif; ?>
                
                

                

                <?php if( get_field('sku') ): ?>
                    <hr>
                    <small><?php _e('Product SKU:', 'alkaline'); ?> <?php the_field('sku'); ?> - 
                    <?php if( get_field('stock_status')  == 'in_stock'): ?>
                        
                         <?php if( get_field('sales_link') ): ?>
                            <?php the_field('stock_count'); ?> <?php _e('in stock', 'alkaline'); ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php _e('Product is not in stock', 'alkaline'); ?>
                    <?php endif; ?>
                    </small>
                <?php endif; ?>
            

        </div>

        <?php if( get_field('full_description') ): ?>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="col-md-8">
                <h2><?php _e('Product Description:', 'alkaline'); ?></h2>
                <?php the_field('full_description'); ?>
                <hr>
                <!-- product sales button -->
                <?php if( get_field('sales_link') ): ?>
                   <a class="btn btn-primary" title="<?php the_field('product_title'); ?>" target="_blank" href="<?php the_field('sales_link'); ?>">Køb her</a>
                   <p><b><?php _e('Questions?', 'alkaline'); ?></b> <?php _e('Call now on +45 21 48 95 06', 'alkaline'); ?></p>
                <?php else: ?>
                    <p><b><?php _e('Questions?', 'alkaline'); ?></b> <?php _e('Call now on +45 21 48 95 06', 'alkaline'); ?></p>
                <?php endif; ?>
                <hr>
            </div>

            
                <div class="col-md-4">
                <?php if( get_field('video') ): ?>
                    <h2><?php _e('Video: ', 'alkaline'); ?></h2>
                    <?php

// get iframe HTML
$iframe = get_field('video');


// use preg_match to find iframe src
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];


// add extra params to iframe src
$params = array(
    'controls'    => 0,
    'hd'        => 1,
    'autohide'    => 1
);

$new_src = add_query_arg($params, $src);

$iframe = str_replace($src, $new_src, $iframe);


// add extra attributes to iframe html
$attributes = 'frameborder="0"';

$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

?>
<div class="embed-container">
<?php echo $iframe; ?>
</div>
                    <br><br>
            <?php endif; ?>
            
            <?php the_field('attributes'); ?>
            </div>

        <?php endif; ?>

    </div>
    </div>
    </div>





<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>