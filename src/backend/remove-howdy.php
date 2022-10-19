<?php
namespace Backend;

/**
 * Remove howdy
 * @link https://developer.wordpress.org/reference/hooks/wp_before_admin_bar_render/
 * @link https://developer.wordpress.org/reference/classes/wp_admin_bar/
 * @link https://developer.wordpress.org/reference/classes/wp_admin_bar/get_node/
 * @link https://developer.wordpress.org/reference/classes/wp_admin_bar/add_node/
 */
add_action('wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $account = $wp_admin_bar->get_node('my-account');
    $title = str_replace('Howdy,', '', $account->title);
    $wp_admin_bar->add_node([
        'id' => 'my-account',
        'title' => $title
    ]);
});
