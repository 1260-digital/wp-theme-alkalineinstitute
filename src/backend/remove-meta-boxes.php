<?php 

if (!current_user_can('update_core')) {
	add_action('admin_menu', function () {
	  if (!current_user_can('update_core')) {
	    remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
	    remove_meta_box( 'commentsdiv', 'post', 'normal' );
	    remove_meta_box( 'slugdiv', 'post', 'normal' );
	    remove_meta_box( 'categorydiv', 'post', 'normal' );
	    remove_meta_box( 'sqpt-meta-tags', 'post', 'normal' );
	    remove_meta_box( 'edit-slug-box', 'post', 'normal' );
	  }
	});
	
	add_action('add_meta_boxes', function () {
	    remove_meta_box( 'wpseo_meta', 'post', 'normal' );
	});
}