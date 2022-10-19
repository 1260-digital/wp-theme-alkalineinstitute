<?php
namespace Backend;

/**
 * Update admin footer label
 * @link https://developer.wordpress.org/reference/hooks/admin_footer_text/
 * @return string
 */
add_filter('admin_footer_text', function () {
    return '<span id="footer-thankyou">Need help? Contact <a href="mailto:hello@mikkeltschentscher.dk">hello@mikkeltschentscher.dk</a></span>';
});
