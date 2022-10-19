<?php 

  $category = get_the_category( get_the_ID() );
  $tags = get_the_tags( get_the_ID() );
  $avatar = get_avatar( get_the_author_meta('email'), '48' );

?>


<?php
    if ( function_exists('yoast_breadcrumb') ) :
        yoast_breadcrumb('<div class="breadcrumb">','</div>');
    endif;
?>

<header>

    <h1><?php the_title(); ?></h1>
    
    <?php if ( has_post_thumbnail() ) : ?>
            <figure>
                <?php the_post_thumbnail( 'large' ); ?>
            </figure>
    <?php endif; ?>

</header>

<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

<?php get_template_part('partials/snippet', 'post-meta-header'); ?>

<?php the_content(); ?>

<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

<footer>
    
    <?php get_template_part('partials/snippet', 'post-meta-footer'); ?>

    <?php
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            }
                        ?>

</footer>


