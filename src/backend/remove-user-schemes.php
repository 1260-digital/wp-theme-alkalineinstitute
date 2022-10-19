<?php
namespace Backend;

/**
 * Enable user color schemes
 * @link https://developer.wordpress.org/reference/functions/remove_action/
 * @link https://developer.wordpress.org/reference/functions/admin_color_scheme_picker/
 */
remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');
