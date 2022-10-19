<?php
namespace Backend;

/**
 * Remove help tabs
 * @link https://developer.wordpress.org/reference/hooks/admin_head/
 * @link https://developer.wordpress.org/reference/functions/get_current_screen/
 * @link https://developer.wordpress.org/reference/classes/wp_screen/remove_help_tabs/
 */
add_action('admin_head', function () {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
});
