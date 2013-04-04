<?php get_header();

// Fetch these IDs now because we'll be using them a lot.
$demo_id = get_cat_ID('Demo');
$featureddemo_id = get_cat_ID('Featured Demo');
$featured_id = get_cat_ID('Featured Article');
?>

<header id="content-head">
  <ul class="nav-crumbs">
    <li><a href="<?php bloginfo('url'); ?>" title="Go to the home page">Home</a></li>
  </ul>

  <h1 class="page-title">Demos</h1>
  <div id="content-bar" class="demos">
    <h2 class="lead"><a href="<?php echo get_category_link($featureddemo_id); ?>page/2/"><span>More</span> featured demos</a></h2>
    <?php
      $feat_demos = fc_custom_loop('cat='.$featureddemo_id.'&posts_per_page=3&template=demos-head-featdemos');
      if (count($feat_demos) == 0) :
    ?>
      <p class="err">Sorry. there are no featured demos at the moment.</p>
    <?php endif; ?>
  </div>
</header><!-- /#content-head -->

<main id="content-main" class="demos">
  <h2 class="lead"><a href="<?php echo get_category_link($demo_id); ?>page/2/"><span>More</span> recent demos</a></h2>
  <?php $recent_demos = fc_custom_loop('cat='.$demo_id.'&template=demo-list');
        if (count($recent_demos) == 0) : ?>
  <p class="err">Sorry. there are no demos at the moment.</p>
  <?php endif; ?>
  <p class="more"><a href="<?php echo get_category_link($demo_id); ?>page/2/">More recent demos</a></p>
</main><!-- /#content-main -->

<aside id="content-sub">
  <ul id="widgets">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('demos') ) : else : ?>
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