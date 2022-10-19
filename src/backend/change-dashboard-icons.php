<?php
add_action('admin_menu', function () {
  global $menu;
  foreach ( $menu as $key => $val ) {
    if ( __( 'Posts') == $val[0] ) {
      $menu[$key][6] = 'dashicons-admin-page';
    }
  }
});