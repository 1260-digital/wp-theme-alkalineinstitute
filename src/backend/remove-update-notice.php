<?php namespace Backend;

/**
 * Remove update notices
 * @link https://codex.wordpress.org/Global_Variables
 * @link https://developer.wordpress.org/reference/functions/current_user_can/
 * @link http://jasonjalbuena.com/disable-wordpress-update-notifications/
 * @return object
 */
function remove_core_updates()
{
    global $wp_version;
    return(object) [
        'last_checked'=> time(),
        'version_checked'=> $wp_version,
        'updates' => []
    ];
}

// Remove control statement to apply to all user roles
if (!current_user_can('update_core')) {
    add_filter('pre_site_transient_update_core', __NAMESPACE__ . '\remove_core_updates');
    add_filter('pre_site_transient_update_plugins', __NAMESPACE__ . '\remove_core_updates');
    add_filter('pre_site_transient_update_themes', __NAMESPACE__ . '\remove_core_updates');
}
