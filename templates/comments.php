<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div id="comments" class="comment-list">

    <?php if ( have_comments() ) : ?>
        <p class="h3 comments-title"><?php _e( 'Comments', 'aandedraettet' ); ?></p>

        <?php the_comments_navigation(); ?>

        <ul class="list-unstyled">
            <?php
                wp_list_comments( array(
                    'style'         => 'ul',
                    'short_ping'    => true,
                    'avatar_size'   => '64',
                    'walker'        => new Bootstrap_Comment_Walker(),
                ) );
            ?>
        </ul>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed', 'aandedraettet' ); ?></p>
    <?php endif; ?>

    <?php
        comment_form( array(
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
            'title_reply_after'  => '</h2>',
        ) );
    ?>

</div>