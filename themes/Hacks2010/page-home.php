<?php get_header();

// Fetch these IDs now because we'll be using them a lot.
$demo_id = get_cat_ID('Demo');
$featureddemo_id = get_cat_ID('Featured Demo');
$featured_id = get_cat_ID('Featured Article');
?>

<header id="content-head">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div id="home-intro">
    <?php the_content(); ?>
  </div>
  <?php endwhile; endif; ?>

  <ul id="home-elsewhere">
    <li><a class="twitter" href="http://twitter.com/mozhacks" rel="external">Follow @mozhacks on Twitter</a></li>
    <li><a class="youtube" href="http://www.youtube.com/user/mozhacks" rel="external">Visit MozHacks on YouTube</a></li>
    <li><a class="rss" href="<?php bloginfo('rss2_url'); ?>" rel="alternate">Subscribe to our news feed</a></li>
  </ul>

  <div id="content-bar" class="home">
    <div id="feat-articles">
      <h2 class="lead"><a href="<?php echo get_category_link($featured_id); ?>"><span>More</span> featured articles</a></h2>
      <?php
        $feat_arts = fc_custom_loop('cat='.$featured_id.'&posts_per_page=3&template=home-head-featarticles');
        if (count($feat_arts) == 0) :
      ?>
      <p class="err">Sorry, there are no featured articles at the moment.</p>
      <?php endif; ?>
    </div>

    <div id="feat-demos">
      <h2 class="lead"><a href="<?php echo get_category_link($featureddemo_id); ?>"><span>More</span> featured demos</a></h2>
      <?php
        $feat_demos = fc_custom_loop('cat='.$featureddemo_id.'&posts_per_page=3&template=home-head-featdemos');
        if (count($feat_demos) == 0) :
      ?>
      <p class="err">Sorry, there are no featured demos at the moment.</p>
      <?php endif; ?>
    </div>

  </div>
</header><!-- /#content-head -->

<main id="content-main" class="home">
  <h2 class="lead"><a href="<?php echo get_permalink(get_page_by_path('articles'));?>page/2/"><span>More</span> recent articles</a></h2>
  <?php
    $recent_arts = fc_custom_loop('template=article-brief');
    if (count($recent_arts) == 0) :
  ?>
  <p class="fail">Sorry, there are no articles at the moment.</p>
  <?php endif; ?>
  <p class="more"><a href="<?php echo get_permalink(get_page_by_path('articles'));?>page/2/">More recent articles</a></p>
</main><!-- /#content-main -->

<aside id="content-sub">
  <ul id="widgets">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('home') ) : else : ?>
    <li class="widget categories">
      <h3>Articles by Category</h3>
      <ul class="cat-list" role="navigation">
       <?php wp_list_categories('show_count=1&hierarchical=0&depth=1&title_li='); ?>
      </ul>
    </li>
<?php endif; ?>
  </ul>
</aside><!-- /#content-sub -->

<?php get_footer(); ?>