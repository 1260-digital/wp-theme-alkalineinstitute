<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php wp_title(); ?></title>

    <?php wp_head(); ?>

    <?php the_field( 'header_scripts', 'options' ); ?>

</head>
<body <?php if ( get_field( 'hide_header') == false ) :  body_class( 'show-header' ); else : body_class( 'hide-header' ); endif; ?> id="intro">

    <?php the_field( 'body_scripts_start', 'options' ); ?>


