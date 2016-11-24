<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package test
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<meta property="og:title" content="Dan (Brown) vs Wild">
<meta property="og:description" content="I am a creator, developer, product guy, strategist, homebrewer, runner, sock enthusiast, beard evangelist, writer, drummer, adventurer, Oxford comma advocate, and human Swiss Army Knife.">
<meta property="og:image" content="<?php bloginfo('template_directory')?>/screenshot.png">
<meta property="og:url" content="http://danvswild.com">
<meta name="twitter:card" content="summary_large_image">

<!-- GOOGLE ANALYTICS -->
<script>
window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
ga('create', 'UA-39888116-1', 'auto');

// Replace the following lines with the plugins you want to use.
ga('require', 'cleanUrlTracker');
ga('require', 'outboundLinkTracker');
ga('require', 'pageVisibilityTracker');
ga('require', 'outboundLinkTracker');
ga('require', 'outboundLinkTracker');
// ...

ga('send', 'pageview');
</script>
<script async src='https://www.google-analytics.com/analytics.js'></script>

<!-- END GOOGLE ANALYTICS -->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php get_template_part( 'components/header/header', 'main' ); ?>

<div id="content" class="site-content">
