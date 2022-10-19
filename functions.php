<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

add_filter('stylesheet', function ($stylesheet) {
    return dirname($stylesheet);
});

add_action('after_switch_theme', function () {
    $stylesheet = get_option('stylesheet');
    if (basename($stylesheet) !== 'templates') {
        update_option('stylesheet', $stylesheet . '/templates');
    }
});

add_action('customize_render_section', function ($section) {
    if ($section->type === 'themes') {
        $section->title = wp_get_theme(basename(__DIR__))->display('Name');
    }
}, 10, 2);

$theme_includes  = [
    'src/theme-setup.php'
];

$backend_includes = [
    'src/backend/clean-wp-head.php',
    'src/backend/change-dashboard-icons.php',
    'src/backend/remove-dashboard-items.php',
    'src/backend/remove-default-taxonomies.php',
    'src/backend/remove-emoji-icons.php',
    'src/backend/remove-help-tabs.php',
    'src/backend/remove-howdy.php',
    'src/backend/remove-menu-items.php',
    'src/backend/remove-meta-boxes.php',
    'src/backend/remove-singular-support.php',
    'src/backend/remove-toolbar-frontend.php',
    'src/backend/remove-toolbar-items.php',
    'src/backend/remove-update-notice.php',
    'src/backend/remove-update-footer.php',
    'src/backend/remove-user-fields.php',
    'src/backend/remove-user-schemes.php',
    'src/backend/remove-user-roles.php',
    'src/backend/remove-post-columns.php',
    'src/backend/update-footer-label.php',
    'src/backend/update-login-head.php'
];

$model_includes = [
    'src/models/custom-post-type.php',
    'src/models/navigation-primary.php',
    'src/models/custom-taxonomy.php',
    'src/models/acf-options.php'
];

$includes = array_merge($theme_includes, $model_includes, $backend_includes);

array_walk($includes, function ($file) {
    if (!locate_template($file, true, true)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'skatein'), $file), E_USER_ERROR);
    }
});
