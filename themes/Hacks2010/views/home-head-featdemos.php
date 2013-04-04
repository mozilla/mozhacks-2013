<?php
/*********
* Featured Demos in the home page header bar (Title, thumbnail).
*/

if ($loop_first) : ?>
<ol class="post-list hfeed homehead">
<?php endif; ?>
  <li class="hentry post demo">
    <h3 class="entry-title">
      <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to &#8220;<?php the_title_attribute(); ?>&#8221; by <?php if (function_exists(coauthors)) : coauthors(); else : the_author(); endif; ?>"><?php the_title(); ?>
        <span class="thumb">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('thumbnail', array('alt' => "", 'title' => "")); ?>
        <?php else : ?>
          <img src="<?php bloginfo('stylesheet_directory'); ?>/img/blank-sm.png" width="72" height="40" alt="" />
        <?php endif; ?>
        <?php if ( get_post_meta($post->ID, 'demo_ribbon', true) ) : ?>
          <strong class="ribbon"><?php echo get_post_meta($post->ID, 'demo_ribbon', true); ?></strong>
        <?php endif; ?>
        </span>
      </a>
    </h3>
  </li><?php /* end entry */ ?>
<?php if ($loop_last) : ?>
</ol>
<?php endif; ?>