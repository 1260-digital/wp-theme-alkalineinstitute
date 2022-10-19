<?php
/**
 * Change the path for the template file. Do not edit.
 *
 * @package WordPress
 * @subpackage dinero-dk
 * @since 1.0.0
 * @author Mikkel Tschentscher
 * @link https://mikkeltschentscher.dk
 */

if (defined('ABSPATH')) {
    update_option('template', get_option('template') . '/templates');
}

die();