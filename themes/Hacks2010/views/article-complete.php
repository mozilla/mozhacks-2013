<?php
/*********
* Articles in complete format (Title, Featured indicator, meta, full content).
* Note that complete Demo posts are no different than complete Article posts, so we only need the one template.
*/

$featureddemo_id = get_cat_ID('Featured Demo');

if ($loop_first) : ?>
<ol class="post-list hfeed complete">
<?php endif; ?>
  <li class="hentry post <?php if (in_category('demo')) : echo " demo"; endif; ?>" id="post-<?php the_ID(); ?>">
    <article>
    <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to &#8220;<?php the_title_attribute(); ?>&#8221;"><?php the_title(); ?></a></h2>
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
    <div class="entry-content">
      <?php the_content('Continued&hellip;'); ?>
    </div>
    </article>
  </li>
<?php if ($loop_last) : ?>
</ol>
<?php endif; ?>