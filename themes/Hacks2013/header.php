<!DOCTYPE html>
<html <?php language_attributes(); ?> id="hacks-mozilla-org">
<head>
  <meta name="viewport" content="width=device-width">
  <meta charset="<?php bloginfo( 'charset' ); ?>">

  <!-- OpenGraph metadata -->
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:title" content="<?php if (is_singular()) : single_post_title(); else : bloginfo('name'); endif; ?>">
  <meta property="og:url" content="<?php if (is_singular()) : the_permalink(); else : bloginfo('url'); endif; ?>">
  <meta property="og:description" content="<?php fc_meta_desc(); ?>">

  <!--[if IE]>
  <meta name="MSSmartTagsPreventParsing" content="true">
  <meta http-equiv="imagetoolbar" content="no">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <link rel="shortcut icon" type="image/ico" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico">
  <link rel="home" href="/">
  <link rel="copyright" href="#copyright">
  <link rel="stylesheet" type="text/css" media="screen,projection" href="<?php bloginfo('stylesheet_url'); ?>">
  <link rel="stylesheet" type="text/css" media="print,handheld" href="<?php echo get_template_directory_uri(); ?>/css/print.css">
  <link rel="stylesheet" type="text/css" media="all" href="https://www.mozilla.org/tabzilla/media/css/tabzilla.css">
  <?php if ( get_option('mozhacks_share_posts') ) : ?>
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/socialshare.css">
  <?php endif; ?>
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <?php if (is_singular()) : ?><link rel="canonical" href="<?php echo the_permalink(); ?>"><?php endif; ?>

  <!--[if lte IE 7]><link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie7.css" /><![endif]-->
  <!--[if lte IE 6]><link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie6.css" /><![endif]-->

  <title><?php if (( is_single() || is_page() ) && (!is_front_page()) ) : ?><?php wp_title($sep = ''); ?> &#10025;
    <?php elseif ( is_search() ) : ?>Search results for &#8220;<?php the_search_query(); ?>&#8221; &#10025;
    <?php elseif ( is_category('Demo') ) : ?>Demos &#10025;
    <?php elseif ( is_category('Featured Demo') ) : ?>Featured Demos &#10025;
    <?php elseif ( is_category('Featured Article') ) : ?>Featured Articles &#10025;
    <?php elseif ( is_category() ) : ?><?php single_cat_title(); ?> Articles &#10025;
    <?php elseif ( is_author() ) : ?>Articles by <?php echo get_userdata(intval($author))->display_name; ?> &#10025;
    <?php elseif ( is_tag() ) : ?>Articles tagged &#8220;<?php single_tag_title(); ?>&#8221; &#10025;
    <?php elseif ( is_day() ) : ?>Articles for <?php the_time('F jS, Y'); ?> &#10025;
    <?php elseif ( is_month() ) : ?>Articles for <?php the_time('F Y'); ?> &#10025;
    <?php elseif ( is_year() ) : ?>Articles for <?php the_time('Y'); ?> &#10025;
    <?php elseif ( is_404() ) : ?>Not Found &#10025;
    <?php elseif ( is_home() ) : ?>Articles &#10025;
    <?php endif; ?>
    <?php bloginfo('name'); ?>
  </title>

  <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

  <script type="text/javascript">
    window.hacks = {};
    // http://cfsimplicity.com/61/removing-analytics-clutter-from-campaign-urls
    var removeUtms  =   function(){
        var l = window.location;
        if( l.hash.indexOf( "utm" ) != -1 ){
            var anchor = l.hash.match(/#(?!utm)[^&]+/);
            anchor  =   anchor? anchor[0]: '';
            if(!anchor && window.history.replaceState){
                history.replaceState({},'', l.pathname + l.search);
            } else {
                l.hash = anchor;
            }
        };
    };
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-35433268-8'],
              ['_setAllowAnchor', true]);
    _gaq.push (['_gat._anonymizeIp']);
    _gaq.push(['_trackPageview']);
    _gaq.push( removeUtms );
    (function(d, k) {
      var ga = d.createElement(k); ga.type = 'text/javascript'; ga.async = true;
      ga.src = 'https://ssl.google-analytics.com/ga.js';
      var s = d.getElementsByTagName(k)[0]; s.parentNode.insertBefore(ga, s);
    })(document, 'script');
  </script>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="outer-wrapper">
  <ul id="nav-access" role="navigation">
    <li><a href="#content-main">Skip to content</a></li>
  </ul>

  <header id="branding">
    <?php if ( (is_front_page()) && ($paged < 1) ) { ?>
    <h1 id="logo">hacks.mozilla.org</h1>
    <?php } else { ?>
    <h4 id="logo">hacks.mozilla.org <a href="<?php bloginfo('url'); ?>" title="Go to the home page">Home</a></h4>
    <?php } ?>

    <?php include (TEMPLATEPATH . '/searchform.php'); ?>

    <nav id="nav-main">
      <ul role="navigation">
        <li <?php if ( (is_front_page()) && ($paged < 1) ) { ?>class="selected"<?php } ?>><a href="<?php bloginfo('url'); ?>">Home</a></li>
        <li <?php if ( is_home() ) { ?>class="selected"<?php } ?>><a href="<?php echo get_permalink(get_page_by_path('articles')->ID); ?>">Articles</a></li>
        <li <?php if ( is_page('demos') || is_category('demo') || is_category('featured-demo')) { ?>class="selected"<?php } ?>><a href="<?php echo get_permalink(get_page_by_path('demos')->ID); ?>">Demos</a></li>
        <li <?php if ( is_page('about') ) {?>class="selected"<?php } ?>><a href="<?php echo get_permalink(get_page_by_path('about')->ID); ?>">About</a></li>
      </ul>
    </nav>
    <a href="#" id="tabzilla">Mozilla</a>
  </header><!-- /#branding -->

  <div id="content">
    
