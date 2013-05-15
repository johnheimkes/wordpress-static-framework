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
    
    <title><?php wp_title(); ?> <?php bloginfo( 'name' ); ?></title>
    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" type="text/css" media="screen" />
    <link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/images/favicon.ico" />
    
    <?php wp_head(); ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script
    <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/app.js"></script>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
  <div id="header">
    
    <div id="nav">
      
    </div>
  </div>