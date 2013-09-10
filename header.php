<?php
/**
* The Header for your theme.
*
* Displays all of the <head> section and everything up till <div class="page-content">
*
* @package Static_Framework
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php STATIC_THEME_PATH_URL; ?>/images/favicon.ico" />
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="page-wrapper">
        <header>
            <div id="nav">

            </div>
        </header>

        <div class="page-content">