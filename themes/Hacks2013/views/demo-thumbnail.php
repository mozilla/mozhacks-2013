<?php
/*********
* Demos in thumbnail format (Title, thumbnail)
*/

if ($loop_first) : ?>
<ol class="post-list hfeed thumbnail">
<?php endif; ?>
  <li class="hentry post demo <?php if ($loop_odd) : echo " odd"; endif;?>" id="post-<?php the_ID(); ?>">
    <h3 class="entry-title">
      <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to &#8220;<?php the_title_attribute(); ?>&#8221;"><?php the_title(); ?>
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
  </li>
<?php if ($loop_last) : ?>
</ol>
<?php endif; ?>