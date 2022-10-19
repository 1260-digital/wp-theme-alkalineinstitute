<?php get_header(); ?>
<?php get_template_part('partials/module', 'header'); ?>


<div class="section section-default">
<div class="container"> 

    
<?php //start by fetching the terms for the animal_cat taxonomy
$terms = get_terms( 'product-categories', array(
    'orderby'    => 'count',
    'order' => 'DESC',
    'hide_empty' => 1
) );
?>

    <?php
// now run a query for each animal family
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
        $i = 1;while ( $query->have_posts() ) : $query->the_post(); ?>
 
      
                        <?php get_template_part('partials/snippet', 'product'); ?>

                        <?php if ($i % 4 == 0) { echo '<div class="row visible-md visible-lg"></div>'; } ?>
                        <?php if ($i % 3 == 0) { echo '<div class="row visible-sm"></div>'; } ?>
         
        <?php $i++;endwhile;
     
    echo '</div>
    <hr>';
     
    // use reset postdata to restore orginal query
    wp_reset_postdata();
 
} ?>
</div>
</div>
<?php get_template_part('partials/module', 'footer'); ?>
<?php get_footer(); ?>