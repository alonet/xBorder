<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!--你看的不是源代码，看的是寂寞。-->
<meta charset="UTF-8">
<?php $options = get_option('Newer_options'); ?>
<title>
<?php
        /*
       * Print the <title> tag based on what is being viewed.
       */
        global $page, $paged;

        wp_title('|', true, 'right');

        // Add the blog name.
        bloginfo('name');

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " | $site_description";

        // Add a page number if necessary:
        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', 'android'), max($paged, $page));

        ?>
</title>
<?php if (is_home() || is_page()) {$description = ($options['description_content']);$keywords = ($options['keyword_content']);}elseif (is_single()) {$description1 = get_post_meta($post->ID, "description", true);$description2 = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200, "……");$description = $description1 ? $description1 : $description2;$keywords = get_post_meta($post->ID, "keywords", true);if($keywords == '') {$tags = wp_get_post_tags($post->ID);    foreach ($tags as $tag ) {        $keywords = $keywords . $tag->name . ", ";    }$keywords = rtrim($keywords, ', ');}}elseif (is_category()) {$description = category_description();$keywords = single_cat_title('', false);}elseif (is_tag()){$description = tag_description();$keywords = single_tag_title('', false);}$description = trim(strip_tags($description));$keywords = trim(strip_tags($keywords));?>
<meta name="description" content="<?php echo $description; ?>" />
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - All Posts" href="<?php bloginfo( 'rss2_url' ); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - All Comments" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="Shortcut Icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php bloginfo('template_directory');?>/images/apple-touch-icon.png">
<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.js"></script>
<!--[if IE 6]>
<html id="ie6" class="is_ie" <?php language_attributes(); ?>>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>	
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="is_ie" <?php language_attributes(); ?>>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/hack/ie7.css" type="text/css" media="all" />
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>	
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="is_ie" <?php language_attributes(); ?>>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>	
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="is_ie" <?php language_attributes(); ?>>
<![endif]-->
<?php wp_head(); ?>
<?php if ( is_singular() ){ ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/comments-ajax.js"></script>
<?php } ?>

</head>
<body <?php body_class(); ?>>
<div id="wrap">
<header>  


  <div class="header-inner">
    <h1><a href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>" class="logo">
      <?php bloginfo('name');?>
      </a></h1>
   
      <?php wp_nav_menu( array( 'theme_location' => 'header-menu','menu_id'=>'nav','container'=>'ul')); ?>
    
	
  </div>

</header>

<!--loding progress bar-->
<div id="globalload" style="display: none;"></div>
<?php if ( is_home() ){ ?>
<script type="text/javascript">

		$("#globalload").fadeIn(900);
							
		
</script>
<?php } ?>