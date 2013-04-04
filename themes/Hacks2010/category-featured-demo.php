<?php get_header();

// Fetch these IDs now because we'll be using them a lot.
$demo_id = get_cat_ID('Demo');
$featureddemo_id = get_cat_ID('Featured Demo');
$featured_id = get_cat_ID('Featured Article');
?>

<header id="content-head">
  <ul class="nav-crumbs">
    <li><a href="<?php bloginfo('url'); ?>" title="Go to the home page">Home</a></li>
    <li><a href="<?php echo get_permalink(get_page_by_path('demos')->ID); ?>">Demos</a></li>
  </ul>

  <h1 class="page-title">Featured Demos</h1>

  <div id="content-bar" class="options">
    <h3>Sort by:</h3>
    <ul class="opt-sort">
      <li<?php tmh_has_query_var('tmh_sort_by', 'date', ' class="selected"', TRUE) ?>><a class="sort-date" href="<?php echo tmh_by_as_url('date'); ?>" title="Sort articles by date, most recent first">Date</a><?php tmh_has_query_var('tmh_sort_by', 'date', ' <em>(this is the current option)</em>', TRUE) ?></li>
<?php if (function_exists('tmh_page_hits_ok') AND tmh_page_hits_ok()) : ?>
      <li<?php tmh_has_query_var('tmh_sort_by', 'views', ' class="selected"') ?>><a class="sort-views" href="<?php echo tmh_by_as_url('views'); ?>" title="Sort articles by number of views, most popular first">Views</a><?php tmh_has_query_var('tmh_sort_by', 'views', ' <em>(this is the current option)</em>') ?></li>
<?php endif; ?>
      <li<?php tmh_has_query_var('tmh_sort_by', 'comments', ' class="selected"') ?>><a class="sort-comments" href="<?php echo tmh_by_as_url('comments'); ?>" title="Sort articles by number of comments, most commented first">Comments</a><?php tmh_has_query_var('tmh_sort_by', 'comments', ' <em>(this is the current option)</em>') ?></li>
    </ul>
    <h3>View:</h3>
    <ul class="opt-view">
      <li<?php tmh_has_query_var('tmh_view_as', 'list', ' class="selected"', TRUE) ?>><a class="view-list" href="<?php echo tmh_by_as_url(TRUE, 'list'); ?>" title="Show a listing of demos">List</a><?php tmh_has_query_var('tmh_view_as', 'list', ' <em>(this is the current view)</em>') ?></li>
      <li<?php tmh_has_query_var('tmh_view_as', 'thumbnail', ' class="selected"') ?>><a class="view-thumbnail" href="<?php echo tmh_by_as_url(TRUE, 'thumbnail'); ?>" title="Show demo preview images">Thumbnails</a><?php tmh_has_query_var('tmh_view_as', 'thumbnail', ' <em>(this is the current view)</em>') ?></li>
      <li<?php tmh_has_query_var('tmh_view_as', 'complete', ' class="selected"') ?>><a class="view-complete" href="<?php echo tmh_by_as_url(TRUE, 'complete'); ?>" title="Show full demos">Complete</a><?php tmh_has_query_var('tmh_view_as', 'complete', ' <em>(this is the current view)</em>') ?></li>
    </ul>

<?php
  $numposts = wp_count_posts()->publish; // total posts
  $numfeatures = tmh_unique_posts_in_category($featured_id); // posts in Featured Article
  $numdemos = tmh_unique_posts_in_category($demo_id); // posts in Demo
  $numfeatdemos = tmh_unique_posts_in_category($featureddemo_id); // posts in Featured Demo
  $allarticles = $numposts - $numdemos; // articles = total posts minus demos
?>
  <?php if ($demo_id || $featureddemo_id) : ?>
    <ul class="opt-posts">
      <?php if ($demo_id) : ?>
      <li><a href="<?php echo get_category_link($demo_id); ?>" title="See all demos">All Demos</a> (<?php echo $numdemos; ?>)</li>
      <?php endif;
        if ($featureddemo_id) : ?>
      <li><a href="<?php echo get_category_link($featureddemo_id); ?>" title="See only Featured demos">Featured</a> (<?php echo $numfeatdemos; ?>)</li><!-- This should revise the loop to show only Articles (still excluding Demos) that are in the Featured category. Should this be another template? -->
      <?php endif; ?>
    </ul>
  <?php endif; ?>

  </div>

</header><!-- /#content-head -->

<main id="content-main">
<?php if (have_posts()) :
  fc_custom_loop($query_string.'&template=demo-%view%'); ?>

  <?php if (fc_show_posts_nav()) : ?>
    <?php if (function_exists('fc_pagination') ) : fc_pagination(); else: ?>
      <ul class="nav-paging">
        <?php if ( $paged < $wp_query->max_num_pages ) : ?><li class="prev"><?php next_posts_link('Previous'); ?></li><?php endif; ?>
        <?php if ( $paged > 1 ) : ?><li class="next"><?php previous_posts_link('Next'); ?></li><?php endif; ?>
      </ul>
    <?php endif; ?>
  <?php endif; ?>

<?php else : ?>
  <p class="fail">Sorry, there are no featured demos.</p>
<?php endif; ?>
</main><!-- /#content-main -->

<aside id="content-sub">
  <ul id="widgets">
    <li class="widget categories">
      <h3 class="widgettitle">Articles by Category</h3>
      <ul class="cat-list" role="navigation">
       <?php wp_list_categories('show_count=1&hierarchical=0&depth=1&title_li='); ?>
      </ul>
    </li>
  </ul>
</aside><!-- /#content-sub -->

<?php get_footer(); ?>