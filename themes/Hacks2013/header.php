<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <!--[if IE]>
  <meta http-equiv="imagetoolbar" content="no">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <meta name="Rating" content="General">
  <meta name="MSSmartTagsPreventParsing" content="true">

  <meta name="viewport" content="width=device-width">

 <!-- For Facebook -->
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:title" content="<?php if (is_singular()) : single_post_title(); else : bloginfo('name'); endif; ?>">
  <meta property="og:url" content="<?php if (is_singular()) : the_permalink(); else : bloginfo('url'); endif; ?>">
  <meta property="og:description" content="<?php fc_meta_desc(); ?>">
  <meta property="og:image" content="<?php bloginfo('stylesheet_directory'); ?>/img/Q.png">

  <meta name="title" content="<?php if (is_singular()) : single_post_title(); echo ' | '; endif; bloginfo('name'); ?>">
  <meta name="description" content="<?php fc_meta_desc(); ?>">

   <!--[if !IE 6]><!-->
      <link href="https://developer.mozilla.org/media/css/fonts.css" media="screen,projection,tv" rel="stylesheet"></link>
<link href="https://developer.mozilla.org/media/css/mdn-screen.css" media="screen,projection,tv" rel="stylesheet"></link>
<link href="https://developer.mozilla.org/media/css/video-player.css" media="screen,projection,tv" rel="stylesheet"></link>
<link href="https://developer.mozilla.org/media/css/mdn-calendar.css" media="screen,projection,tv" rel="stylesheet"></link>
<link href="https://developer.mozilla.org/media/css/redesign-transition.css" media="screen,projection,tv" rel="stylesheet"></link>
            <!--<![endif]-->
      <!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="/media/css/ie.css" /><![endif]-->
      <!--[if lte IE 7]><link rel="stylesheet" type="text/css" media="all" href="/media/css/ie7.css" /><![endif]-->
      <!--[if lte IE 6]><link rel="stylesheet" type="text/css" media="all" href="/media/css/ie6.css" /><![endif]-->
      <link href="https://developer.mozilla.org/media/css/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"></link>
      <link href="https://developer.mozilla.org/media/css/mdn-print.css" media="print" rel="stylesheet" type="text/css"></link>
      <link href="//mozorg.cdn.mozilla.net/media/css/tabzilla-min.css" rel="stylesheet"></link>

      <link href="https://developer-local.allizom.org/en-US/search/xml" rel="search" title="Mozilla Developer Network" type="application/opensearchdescription+xml"></link>
<!--[if IE]>
  <meta http-equiv="imagetoolbar" content="no">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <script src="https://developer-local.allizom.org//media/js/libs/html5.js"></script>
  <![endif]-->

  <script type="text/javascript">
  // This represents the site configuration
  window.mdn = {
    build: 'e8ce54a',
    ckeditor: {},
    mediaPath: '/media/',
    wiki: {
      autosuggestTitleUrl: '/docs/get-documents'
    }
  };
  // Ensures gettext always returns something, is always set
  window.gettext = function(x) { return x; }
</script>
      <link href="https://developer.mozilla.org/media/css/wiki.css" media="screen,projection,tv" rel="stylesheet"></link>
<link href="https://developer.mozilla.org/media/css/wiki-screen.css" media="screen,projection,tv" rel="stylesheet"></link>
<link href="https://developer.mozilla.org/media/js/libs/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.min.css" media="screen,projection,tv" rel="stylesheet"></link>
<link href="https://developer.mozilla.org/media/css/jqueryui/moz-jquery-plugins.css" media="screen,projection,tv" rel="stylesheet"></link>
<link href="https://developer.mozilla.org/media/css/sphinx.css" media="screen,projection,tv" rel="stylesheet"></link>

<meta charset="utf-8">
  <meta name="robots" content="index, follow">
  <link rel="home" href="/en-US/">
  <link rel="copyright" href="#copyright">
  <link rel="shortcut icon" href="https://developer.cdn.mozilla.net/media/img/favicon.ico">



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


  <?php wp_head(); ?>
<body <?php body_class(); ?>>
<!--[if lte IE 8]>
<noscript><div class="global-notice">
<p><strong>Warning:</strong> The Mozilla Developer Network website employs emerging web standards that may not be fully supported in some versions of Microsoft Internet Explorer. You can improve your experience of this website by enabling JavaScript.</p></div></noscript>
<![endif]-->
  <header class="minor new-menu" id="masthead">
    <div class="wrap">
      <ul id="nav-access">
        <li><a href="https://developer.mozilla.org/#language">Select language</a></li>
                <li><a href="https://developer.mozilla.org/#content">Skip to main content</a></li>
      </ul>

      <div id="branding">
                <div id="logo"><a href="https://developer.mozilla.org/"><img alt="Mozilla Developer Network" height="71" src="https://developer.mozilla.org/media/img/mdn-logo-sm.png" title="Mozilla Developer Network" width="62"></img> Mozilla Developer Network</a></div>
              </div>
              <nav id="nav">
          <ul id="nav-main" role="menubar">
            <li class="menu" id="nav-main-docs" rel="menuitem"><a aria-haspopup="true" aria-labelledby="nav-main-docs" class="toggle" href="https://developer.mozilla.org/#nav-sub-docs" title="Read Documentation">Read<br><em>Docs</em></a>
              <div aria-hidden="true" class="sub-menu" id="nav-sub-docs">
                <ul>
                  <li>
                    <ul>

                      <li><a href="https://developer.mozilla.org/en-US/docs/Web/HTML?menu">HTML</a></li>
                      <li><a href="https://developer.mozilla.org/en-US/docs/Web/CSS?menu">CSS</a></li>
                      <li><a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript?menu">JavaScript</a></li>
                      <li><a href="https://developer.mozilla.org/en-US/docs/Web/Guide/Graphics?menu">Graphics</a></li>
                      <li><a href="https://developer.mozilla.org/en-US/docs/Web/API?menu">APIs / DOM</a></li>
                      <li><a href="https://developer.mozilla.org/en-US/docs/Web/Apps?menu">Apps</a></li>
                      <li><a href="https://developer.mozilla.org/en-US/docs/tools?menu">Dev Tools</a></li>
                      <li><a href="https://developer.mozilla.org/en-US/docs/Web/MathML?menu">MathML</a></li>
                    </ul>
                  </li>
                  <li>
                    <ul>
                      <li><a href="https://developer.mozilla.org/en-US/docs/Web/Tutorials?menu">Tutorials</a></li>
                      <li><a href="https://developer.mozilla.org/en-US/docs/Web/Reference?menu">References</a></li>
                      <li><a href="https://developer.mozilla.org/en-US/docs/Web/Guide?menu">Developer Guides</a></li>
                      <li><a href="https://developer.mozilla.org/en-US/docs/Accessibility?menu">Accessibility</a></li>
                      <li><a href="https://developer.mozilla.org/demos/?menu">Demos</a></li>
                      <li><br><br><a href="https://developer.mozilla.org/docs?menu">...more docs</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </li>
            <li id="nav-main-apps"><a href="https://marketplace.firefox.com/developers/?menu">Make<br><em>Apps</em></a>
            </li>
            <li class="menu" id="nav-main-firefox" role="menuitem"><a aria-haspopup="true" aria-labelledby="nav-main-firefox" class="firefox toggle" href="https://developer.mozilla.org/#nav-sub-firefox">Build &amp; Use<br><em>Firefox</em></a>
              <ul class="sub-menu" id="nav-sub-firefox">
                <li><a href="https://developer.mozilla.org/en-US/docs/Mozilla/Firefox_OS?menu">Firefox OS</a></li>
                <li><a href="https://developer.mozilla.org/en-US/docs/Mozilla/Firefox?menu">Firefox Desktop</a></li>
                <li><a href="https://developer.mozilla.org/en-US/docs/Mozilla/Mobile?menu">Mobile</a></li>
                <li><a href="https://developer.mozilla.org/en-US/docs/Mozilla/Add-ons?menu">Add-ons</a></li>
              </ul>
            </li>
            <li id="nav-main-demos" role="menuitem"><a class="demos" href="https://developer.mozilla.org/demos/?menu">See &amp; Submit<br><em>Demos</em></a></li>
            <li class="menu" id="nav-main-community" role="menuitem"><a aria-haspopup="true" aria-labelledby="nav-main-community" class="community toggle" href="https://developer.mozilla.org/#nav-sub-community">Get<br><em>Involved</em></a>
              <ul class="sub-menu" id="nav-sub-community">
                <li><a href="https://developer.mozilla.org/en-US/docs/Project:MDN/Contributing/Join_the_community?menu">Join the Community</a></li>
                <li><a href="https://developer.mozilla.org/en-US/docs/Project:MDN/Contributing?menu">Contribute to MDN</a></li>
                <li><a href="https://developer.mozilla.org/events?menu">Events</a></li>
                <li><a href="https://developer.mozilla.org/en-US/docs/Project:MDN/Contributing/Follow_what_s_happening?menu">Tweets, Blogs, and More</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <a href="//www.mozilla.org/" id="tabzilla">mozilla</a>
    </div>
  </header>
  <!-- top toolbar -->
  <section id="nav-toolbar"><div><div class="wrap">

    <!-- left crumb navigation -->
    <nav class="crumbs" role="navigation">
      <ol>
          <li class="crumb"><a href="https://developer.mozilla.org/{{ pathto(master_doc) }}">{{ docstitle }}</a></li>
          <li class="crumb">{{ title }}</li>
      </ol>
    </nav>

  </div></div></section>