<hr>
<?php 

  $category = get_the_category( get_the_ID() );
?>

<?php _e( 'Post written by ', 'alkaline' ) . the_author_posts_link(); ?>
                
<?php 
    _e( 'on ', 'alkaline' );
    echo $time = get_post_time(
        'j. F Y',      // format
        TRUE,          // GMT
        get_the_ID(),  // Post ID
        TRUE           // translate, use date_i18n()
    );
?>
                <?php _e( 'in the category ', 'alkaline' ); ?>

                <?php if ( $category ) : foreach($category as $cat) : ?>

        <a href="<?php echo get_category_link($cat->cat_ID); ?>"><?php echo $cat->name ?></a>
    <?php endforeach; endif; ?>    


 <hr>