<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title>
      luke pacholski's design &amp; illustration blog | flukeout.com
    </title>
    
    <meta name="viewport" content="width=420">
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
    
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/jquery.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/cookies.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/swipe.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/application.js"></script>

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" media="screen and (max-width: 420px)" href="<?php bloginfo('template_directory'); ?>/small_devices.css" type="text/css" />

    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <?php wp_head(); ?>
            
  </head>

  <body>


    <div id="page_wrapper">
    <div id="page">

      <div id="header">
         <h1>
           <a href="/">
             <span id="home_icon"></span>
             <span class="f">f</span>lukeout
           </a>
           <span id="blog_description">luke pacholski's design &amp; illustration</span>
         </h1>
       </div>

  
    <div id="content_wrapper">

    <?php get_template_part( 'thumbnails' );           // Navigation bar (thumbnails.php) ?>
