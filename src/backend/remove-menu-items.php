<?php
namespace Backend;

/**
 * Remove menu items
 * @link https://developer.wordpress.org/reference/hooks/admin_init/
 * @link https://developer.wordpress.org/reference/functions/current_user_can/
 * @link https://developer.wordpress.org/reference/functions/remove_menu_page/
 * @link https://developer.wordpress.org/reference/functions/remove_submenu_page/
 */
add_action('admin_init', function () {


        // Posts
       // remove_menu_page('edit.php');
       // remove_submenu_page('edit.php', 'post-new.php');
       // remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
       // remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');

        // Comments
        // remove_menu_page('edit-comments.php');


    if (!current_user_can('update_core')) {
        // Dashboard
        // remove_menu_page('index.php');
        // remove_submenu_page('index.php', 'update-core.php');

        // Media
        // remove_menu_page('upload.php');
        // remove_submenu_page('upload.php', 'media-new.php');

        // Pages
        // remove_menu_page('edit.php?post_type=page');
        // remove_submenu_page('edit.php?post_type=page', 'post-new.php?post_type=page');

        // Appearance
        // remove_menu_page('themes.php');
        remove_submenu_page('themes.php', 'widgets.php');
        // remove_submenu_page('themes.php', 'nav-menus.php');
        // remove_submenu_page('themes.php', 'theme-editor.php');

        // Plugins
        remove_menu_page('plugins.php');
        remove_submenu_page('plugins.php', 'plugin-install.php');
        remove_submenu_page('plugins.php', 'plugin-editor.php');

        // Users
        // remove_menu_page('users.php');
        // remove_submenu_page('users.php', 'user-new.php');
        // remove_submenu_page('users.php', 'profile.php');

        // Tools
        // remove_menu_page('tools.php');
        // remove_submenu_page('tools.php', 'import.php');
        // remove_submenu_page('tools.php', 'export.php');
        // remove_submenu_page('tools.php', 'wp-sync-db');

        // Settings
        remove_menu_page('options-general.php');
        remove_submenu_page('options-general.php', 'options-writing.php');
        remove_submenu_page('options-general.php', 'options-reading.php');
        remove_submenu_page('options-general.php', 'options-media.php');
        remove_submenu_page('options-general.php', 'options-permalink.php');
        remove_submenu_page('options-general.php', 'options-discussion.php');
        remove_submenu_page('options-general.php', 'options-media.php');
        remove_submenu_page('options-general.php', 'disable_comments_settings');

        // Advanced Custom Fields
        remove_menu_page('edit.php?post_type=acf-field-group');
        remove_submenu_page('edit.php?post_type=acf-field-group' , 'post-new.php?post_type=acf-field-group');
        remove_submenu_page('edit.php?post_type=acf-field-group' , 'acf-settings-tools');
        remove_submenu_page('edit.php?post_type=acf-field-group' , 'acf-settings-updates');
    }
});
