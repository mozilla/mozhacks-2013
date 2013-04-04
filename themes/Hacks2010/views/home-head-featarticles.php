<?php
/*********
* Featured Articles in the home page header bar (Title, meta).
*/

if ($loop_first) : ?>
 <ol class="post-list hfeed title">
<?php endif; ?>
  <li class="hentry post">
    <h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to &#8220;<?php the_title_attribute(); ?>&#8221;"><?php the_title(); ?></a></h3>
    <p class="entry-meta">
      <time class="published" pubdate="pubdate" datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>" title="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php the_time(get_option('date_format')); ?></time>
      &bull; by <?php if (function_exists(coauthors_posts_links)) : coauthors_posts_links(); else : the_author_posts_link(); endif; ?>
      &bull; <?php fc_category_minusfeat(', ') ?>
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
