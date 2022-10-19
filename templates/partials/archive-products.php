

<div class="section section-default">
<div class="container"> 

    
<?php 
$terms = get_terms( 'product-categories', array(
    'orderby'    => 'count',
    'hide_empty' => 1
) );
?>

    <?php

foreach( $terms as $term ) {
 
    // Define the query
    $args = array(
        'post_type' => 'products',
        'product-categories' => $term->slug
    );
    $query = new WP_Query( $args );
             
    // output the term name in a heading tag                
    echo'<h2>' . $term->name . '</h2>';
     
    // output the post titles in a list
    echo '<div class="row">';
     
        // Start the Loop
        while ( $query->have_posts() ) : $query->the_post(); ?>
 
        <div class="col-xs-12 col-sm-4 col-md-3 col-archive">
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
                    <span class="price price-prev"><?php the_field('regular_price'); ?> <span class="currency"> <?php _e( 'DKK', 'alkaline' ); ?></span></span>
                    <span class="price price-current"><?php the_field('sale_price'); ?> <span class="currency"> <?php _e( 'DKK', 'alkaline' ); ?></span></span>
                <?php else: ?>
                    <span class="price price-current"><?php the_field('regular_price'); ?> <span class="currency"> <?php _e( 'DKK', 'alkaline' ); ?></span></span>
                <?php endif; ?>


                <a class="btn btn-sm btn-primary" title="<?php the_field('product_title'); ?>" href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'alkaline'); ?></a>

        </div>
         
        <?php endwhile;
     
    echo '</div>
    <hr>';
     
    // use reset postdata to restore orginal query
    wp_reset_postdata();
 
} ?>
</div>
</div>

