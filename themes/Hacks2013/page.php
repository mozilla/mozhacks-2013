<?php get_header(); ?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

<header id="content-head">
  <ul class="nav-crumbs">
    <li><a href="<?php bloginfo('url'); ?>" title="Go to the home page">Home</a></li>
  </ul>

  <h1 class="page-title"><?php the_title(); ?></h1>

  <?php if ( current_user_can( 'edit_page', $post->ID ) ) : ?><p class="edit"><?php edit_post_link('Edit Page', '', ''); ?></p><?php endif; ?>

  <div id="content-bar" class="single">
    <ul class="entry-extra">
    <?php $comment_count = get_comment_count($post->ID);
      if ( comments_open() || $comment_count['approved'] > 0 ) : ?>
      <li class="comments"><a href="<?php comments_link(); ?>"><?php comments_number('No comments yet','1 comment','% comments'); ?></a></li>
    <?php endif; ?>
    <?php if ( get_option('mozhacks_share_posts') ) : ?>
      <li class="share"><div class="socialshare" data-type="small-bubbles"></div></li>
    <?php endif; ?>
    </ul>
  </div>
</header><!-- /#content-head -->

<main id="content-main">
  <article class="post" id="post-<?php the_ID(); ?>" role="article">
    <?php the_content('Read more&hellip;'); ?>
  </article>

  <?php wp_link_pages(array('before' => '<p class="pages"><b>Pages:</b> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

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
<section id="content-main" role="article">
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

<?php get_footer(); ?>