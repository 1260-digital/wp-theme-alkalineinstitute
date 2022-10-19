<?php namespace Backend;

/**
 * Remove toolbar/admin bar from frontend
 * @link https://developer.wordpress.org/reference/functions/show_admin_bar/
 */
if (!current_user_can('update_core')) {
	// add_filter('show_admin_bar', '__return_false');
}
