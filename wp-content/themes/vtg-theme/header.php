<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package __package
 */

?><!DOCTYPE html>
<!--[if lte IE 8]> <html class="no-js lt-ie10 lt-ie9 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 9]> <html class="no-js lt-ie10 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Lato" rel="stylesheet">
<script src="https://use.fontawesome.com/3116095123.js"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="breakpoint-context"></div>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '__package' ); ?></a>



	<div id="content" class="site-content">
