<?php
/*********
* Articles in brief format (Title, Featured indicator, meta, excerpt).
* Also accommodates Demo posts for mixed pages (archives etc).
*/

$demo_id = get_cat_ID('Demo');
$featureddemo_id = get_cat_ID('Featured Demo');

if ($loop_first) : ?>
<ol class="post-list hfeed brief">
<?php endif; ?>
  <li class="hentry post <?php if (in_category($demo_id) || in_category($featureddemo_id) ) : echo " demo"; endif; ?>" id="post-<?php the_ID(); ?>">
    <h2 class="entry-title">
      <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to &#8220;<?php the_title_attribute(); ?>&#8221;"><?php the_title(); ?>
      <?php if (in_category($demo_id) || in_category($featureddemo_id)) : ?>
        <span class="thumb">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('thumbnail', array('alt' => "", 'title' => "")); ?>
        <?php else : ?>
          <img src="<?php bloginfo('stylesheet_directory'); ?>/img/blank-sm.png" width="130" height="70" alt="" />
        <?php endif; ?>
        <?php if ( get_post_meta($post->ID, 'demo_ribbon', true) ) : ?>
          <strong class="ribbon"><?php echo get_post_meta($post->ID, 'demo_ribbon', true); ?></strong>
        <?php endif; ?>
        </span>
      <?php endif; ?>
      </a>
    </h2>
    <p class="entry-meta">
      <time class="published" pubdate="pubdate" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>" title="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php the_time(get_option('date_format')); ?></time>
      &bull; by <?php if (function_exists(coauthors_posts_links)) : coauthors_posts_links(); else : the_author_posts_link(); endif; ?>
      &bull; <?php if (in_category($featureddemo_id)) : fc_category_minusdemo(', '); else : the_category(', '); endif; ?>
      &bull; <?php $comment_count = get_comment_count($post->ID);
        if ( comments_open() || $comment_count['approved'] > 0 ) : ?>
        <a href="<?php comments_link() ?>"><?php comments_number('No comments yet','1 comment','% comments'); ?></a>
      <?php else : ?>
        Comments off
      <?php endif; ?>
      <?php if ( current_user_can( 'edit_page', $post->ID ) ) : ?>&bull; <span class="edit"><?php edit_post_link('Edit Post', '', ''); ?></span><?php endif; ?>
    </p>
    <?php if (!(in_category($demo_id) || in_category($featureddemo_id)) ) : ?>
    <p class="entry-summary">
      <?php if( function_exists(fc_excerpt)): fc_excerpt('45'); else: the_excerpt(); endif; ?>
      <a class="more-link" href="<?php the_permalink() ?>" title="Read more of &#8220;<?php the_title_attribute(); ?>&#8221;">Read more&hellip;</a>
    </p>
    <?php endif; ?>
  </li>
<?php if ($loop_last) : ?>
</ol>
<?php endif; ?>