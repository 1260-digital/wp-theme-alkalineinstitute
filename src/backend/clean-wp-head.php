<?php

// Clean Up the obsulete wp_head(); stuff for WordPress 4.4.x
  if ( ! function_exists( 'clean_wp_head' ) ):
    function clean_wp_head() {
      remove_action( 'wp_head', 'wp_generator'); 
      remove_action( 'wp_head', 'feed_links' );
      remove_action( 'wp_head', 'feed_links', 2 );
      remove_action( 'wp_head', 'feed_links_extra', 3 );
      remove_action( 'wp_head', 'rsd_link');
      remove_action( 'wp_head', 'wlwmanifest_link');
      remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
      remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0);
      remove_action( 'wp_print_styles', 'print_emoji_styles' );
      remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
      remove_action('wp_head','rest_output_link_wp_head');
      remove_action('rest_api_init', 'wp_oembed_register_route');
      remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
      remove_action('wp_head', 'wp_oembed_add_discovery_links');
      remove_action('wp_head', 'wp_oembed_add_host_js');
      remove_action( 'wp_head', 'wp_resource_hints', 2 );
    }
    clean_wp_head(); 
  endif;