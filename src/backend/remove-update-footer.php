<?php 
/**
 * Remove Update Footer
 * @link https://developer.wordpress.org/reference/hooks/update_footer/
 * @return string
 */
add_action('admin_menu', function () {
    remove_filter( 'update_footer', 'core_update_footer' );
});
