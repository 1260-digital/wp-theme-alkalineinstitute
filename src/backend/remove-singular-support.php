<?php
/**
 * Remove singular post type support
 * @link https://developer.wordpress.org/reference/hooks/admin_init/
 * @link https://developer.wordpress.org/reference/functions/remove_post_type_support/
 */
add_action('admin_init', function () {
    // Pages
    remove_post_type_support('page', 'author');
    remove_post_type_support('page', 'thumbnail');
    remove_post_type_support('page', 'comments');
    remove_post_type_support('page', 'custom-fields');

});
