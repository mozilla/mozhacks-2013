<?php
/*********
* Featured Demos in the Demos page header bar (Big thumbnail, title, meta).
*/

if ($loop_first) : ?>
<ol class="post-list hfeed demohead">
<?php endif; ?>
<li class="hentry post demo">
  <h3 class="entry-title">
    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to &#8220;<?php the_title_attribute(); ?>&#8221; by <?php if (function_exists(coauthors)) : coauthors(); else : the_author(); endif; ?>"><?php the_title(); ?>
      <span class="thumb">
      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('thumbnail', array('alt' => "", 'title' => "")); ?>
      <?php else : ?>
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/blank.png" width="220" height="125" alt="" />
      <?php endif; ?>
      <?php if ( get_post_meta($post->ID, 'demo_ribbon', true) ) : ?>
        <strong class="ribbon"><?php echo get_post_meta($post->ID, 'demo_ribbon', true); ?></strong>
      <?php endif; ?>
      </span>
    </a>
  </h3>
  <p class="entry-meta">
    <?php fc_category_minusfeatdemo(', '); ?>
    &bull; <?php $comment_count = get_comment_count($post->ID);
      if ( comments_open() || $comment_count['approved'] > 0 ) : ?>
      <a href="<?php comments_link() ?>"><?php comments_number('No comments yet','1 comment','% comments'); ?></a>
    <?php else : ?>
      Comments off
    <?php endif; ?>
  </p>
</li>
<?php if ($loop_last) : ?>
</ol>
<?php endif; ?>