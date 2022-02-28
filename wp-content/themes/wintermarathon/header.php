<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *

 */
#print_r($post);
$et_pagename = (is_front_page() ? "__INDEX__" : "") . 'Wintermarathon/' . ($post->post_type == "post_results" ? "Ergebnisse/" : "") . ($post->post_type == "post_news" ? "News/" : "") . get_the_title();
$et_areas = 'Wintermarathon' . ($post->post_type == "post_results" ? "/Ergebnisse" : "") . ($post->post_type == "post_news" ? "/News" : "");
$et_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta name="google-site-verification" content="5da2aTSMYsQtAy3bMRJk5YuieLJofG4TbkRAqEly7a4" />
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($post->post_type == "post_results" ? "Ergebnisse " : "") . get_the_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <?php echo '<link href="' . get_stylesheet_directory_uri() . '/static/img/favicon/favicon32x32.ico" type="image/vnd.microsoft.icon" rel="icon">';
    ?>



    <meta name="description" content="<?php echo CFS()->get('ogdescription'); ?>"/>
    <meta property="og:url"                content="<?php echo $et_url; ?>"/>
    <meta property="og:description"        content="<?php echo CFS()->get('ogdescription'); ?>"/>
    <meta property="og:image"              content="<?php if(CFS()->get('ogimage')=="") { echo get_stylesheet_directory_uri().'/img/share.jpg'; }  else {echo CFS()->get('ogimage');};?>"/>
    <meta property="og:title"              content="<?php echo ($post->post_type == "post_results" ? "Ergebnisse " : "") . get_the_title(); ?>"/>


    <link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/static/css/main.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/static/css/ie10.css"/>
    <link type="text/css" rel="stylesheet" media="(min-width:0px) and (max-width:720px)" href="<?php echo get_stylesheet_directory_uri(); ?>/static/css/mobile.css"/>
    <link type="text/css" rel="stylesheet" media="(min-width:721px) and (max-width:1024px)" href="<?php echo get_stylesheet_directory_uri(); ?>/static/css/tablet.css"/>
    <link type="text/css" rel="stylesheet" media="(min-width: 1215px)" href="<?php echo get_stylesheet_directory_uri(); ?>/static/css/desktop.css"/>
    <link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/static/slick/slick.css">
    <link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/static/css/fancybox.css">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/static/img/favicon/w-apple-touch-icon-precomposed.png"/>
    <link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/static/css/wufooskin.css"/>
    <?php wp_head(); ?>

    <?php get_template_part( 'template-parts/content', "colors" ); ?>

</head>

<body>
