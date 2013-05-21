<?php
/*********
* Demos in list format (Title, thumbnail, meta)
*/

if ($loop_first) : ?>
<ol class="post-list hfeed list">
<?php endif; ?>
  <li class="hentry post demo" id="post-<?php the_ID(); ?>">
    <h3 class="entry-title">
      <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to &#8220;<?php the_title_attribute(); ?>&#8221;"><?php the_title(); ?>
      <span class="thumb">
      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('thumbnail', array('alt' => "", 'title' => "")); ?>
      <?php else : ?>
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/blank-sm.png" width="130" height="73" alt="" />
      <?php endif; ?>
      <?php if ( get_post_meta($post->ID, 'demo_ribbon', true) ) : ?>
        <strong class="ribbon"><?php echo get_post_meta($post->ID, 'demo_ribbon', true); ?></strong>
      <?php endif; ?>
      </span>
      </a></h3>
    <p class="entry-meta">
      <time class="published" pubdate="pubdate" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>" title="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php the_time(get_option('date_format')); ?></time>
      &bull; by <?php if (function_exists(coauthors_posts_links)) : coauthors_posts_links(); else : the_author_posts_link(); endif; ?>
    </p>
    <p class="entry-meta">
      <?php fc_category_minusdemo(', '); ?>
      &bull; <?php $comment_count = get_comment_count($post->ID);
        if ( comments_open() || $comment_count['approved'] > 0 ) : ?>
        <a href="<?php comments_link() ?>"><?php comments_number('No comments yet','1 comment','% comments'); ?></a>
      <?php else : ?>
        Comments off
      <?php endif; ?>
      <?php if ( current_user_can( 'edit_page', $post->ID ) ) : ?><span class="edit"><?php edit_post_link('Edit Post', '', ''); ?></span><?php endif; ?>
    </p>
  </li>
<?php if ($loop_last) : ?>
</ol>
<?php endif; ?>
