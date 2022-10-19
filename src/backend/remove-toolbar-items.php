<?php 

/**
 * Remove toolbar/admin bar items
 * @link https://developer.wordpress.org/reference/hooks/wp_before_admin_bar_render/
 * @link https://codex.wordpress.org/Global_Variables
 * @link https://developer.wordpress.org/reference/classes/wp_admin_bar/
 * @link https://developer.wordpress.org/reference/classes/wp_admin_bar/remove_node/
 */
if (!current_user_can('update_core')) {
    add_action('wp_before_admin_bar_render', function () {
        global $wp_admin_bar;
        
        // General
        // $wp_admin_bar->remove_node('wp-logo');
        $wp_admin_bar->remove_node('updates');
        //$wp_admin_bar->remove_node('site-name');

        // Comments
        $wp_admin_bar->remove_node('comments');

        // New
        // $wp_admin_bar->remove_node('new-content');
        $wp_admin_bar->remove_node('new-post');
        // $wp_admin_bar->remove_node('new-page');
        // $wp_admin_bar->remove_node('new-media');
        $wp_admin_bar->remove_node('new-user');

        // Account
        // $wp_admin_bar->remove_node('my-account');
        // $wp_admin_bar->remove_node('user-info');
        // $wp_admin_bar->remove_node('edit-profile');
        // $wp_admin_bar->remove_node('logout');
    });
}


/**
 * Add all Gravity Forms capabilities to Editor role.
 * 
 * @access public
 */
function add_grav_forms(){
    $role = get_role('editor');
    $role->add_cap('gform_full_access');
}
add_action('admin_init','add_grav_forms');