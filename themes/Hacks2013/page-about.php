<?php get_header();

// Fetch these IDs now because we'll be using them a lot.
$demo_id = get_cat_ID('Demo');
$featureddemo_id = get_cat_ID('Featured Demo');
$featured_id = get_cat_ID('Featured Article');
?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

  <header id="content-head">
    <ul class="nav-crumbs">
      <li><a href="<?php bloginfo('url'); ?>" title="Go to the home page">Home</a></li>
    </ul>
    <h1 class="page-title"><?php the_title(); ?></h1>
    <?php if ( current_user_can( 'edit_page', $post->ID ) ) : ?><p class="edit"><?php edit_post_link('Edit Page', '', ''); ?></p><?php endif; ?>
    <div id="content-bar" class="ignore-me"></div>
  </header>

  <main id="content-main">
    <article class="post" id="post-<?php the_ID(); ?>">
      <?php the_content('Read more&hellip;'); ?>
      <?php wp_link_pages(array('before' => '<p class="pages"><b>Pages:</b> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    </article>
    <?php endwhile; ?>

    <?php if (fc_show_posts_nav()) : ?>
      <?php if (function_exists('fc_pagination') ) : fc_pagination(); else: ?>
        <ul class="nav-paging">
          <?php if ( $paged < $wp_query->max_num_pages ) : ?><li class="prev"><?php next_posts_link('Previous'); ?></li><?php endif; ?>
          <?php if ( $paged > 1 ) : ?><li class="next"><?php previous_posts_link('Next'); ?></li><?php endif; ?>
        </ul>
      <?php endif; ?>
    <?php endif; ?>

      <?php comments_template(); ?>

    <?php else : ?>

    <div id="fail">
      <h2>Sorry, we couldn&#8217;t find that</h2>
      <p>We looked everywhere, but we couldn&#8217;t find the page or file you were looking for. A few possible explanations:</p>
      <ul>
        <li>You may have followed an out-dated link or bookmark.</li>
        <li>If you entered the address by hand, you may have mistyped it.</li>
        <li>You might have just discovered an error. Congratulations!</li>
      </ul>
    </div>

  <?php endif; ?>

  </main><!-- /#content-main -->

  <aside id="content-sub">
    <ul id="widgets">
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('about') ) : else : ?>
      <li class="widget categories">
        <h3 class="widgettitle">Articles by Category</h3>
        <ul class="cat-list" role="navigation">
         <?php wp_list_categories('show_count=1&hierarchical=0&depth=1&title_li='); ?>
        </ul>
      </li>
      <li class="widget links">
        <ul>
        <?php wp_list_bookmarks('category_name=Our Sister Sites&title_li='); ?>
        </ul>
      </li>
    <?php endif; ?>
    </ul>
  </aside><!-- /#content-sub -->

  <!-- Put authors in this section -->
  <div id="authors" class="about-authors">
    <?php echo dw_list_authors(); ?>
  </div>

<?php get_footer(); ?>