<?php get_header();

$options = get_option( 'enable_sharing' );

// Fetch these IDs now because we'll be using them a lot.
$demo_id = get_cat_ID('Demo');
$featureddemo_id = get_cat_ID('Featured Demo');
$featured_id = get_cat_ID('Featured Article');
?>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

<div id="content-head">
  <ul class="nav-crumbs">
    <li><a href="<?php bloginfo('url'); ?>" title="Go to the home page">Home</a></li>
    <li><?php if (in_category('demo')) : ?><a href="<?php echo get_permalink(get_page_by_path('demos')->ID); ?>">Demos</a><?php else : ?><a href="<?php echo get_permalink(get_page_by_path('articles')->ID); ?>">Articles</a><?php endif; ?></li>
  </ul>

  <h1 class="page-title"><?php the_title(); ?></h1>

<?php if ( fc_previous_post() || fc_next_post() ) : ?>
  <ul class="nav-paging">
    <?php if (fc_previous_post()) { ?><li class="prev"><?php previous_post_link('%link', 'Older Article'); ?></li><?php } ?>
    <?php if (fc_next_post()) { ?><li class="next"><?php next_post_link('%link', 'Newer Article'); ?></li><?php } ?>
  </ul>
<?php endif; ?>

<?php if ( current_user_can( 'edit_page', $post->ID ) ) : ?><p class="edit"><?php edit_post_link('Edit Post', '', ''); ?></p><?php endif; ?>

  <div id="content-bar" class="single">
    <div class="entry-meta">
      <p class="entry-posted">on <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php the_time(get_option('date_format')); ?></abbr>
      by <?php if (function_exists(coauthors_posts_links)) : coauthors_posts_links(); else : the_author_posts_link(); endif; ?></p>
      <p class="entry-cat">in
      <?php if (in_category($featureddemo_id)) :
          fc_category_minusdemo(' ');
        else :
          the_category(' ');
        endif; ?>
      </p>
    </div>

    <ul class="entry-extra">
      <li class="comments">
      <?php $comment_count = get_comment_count($post->ID);
        if ( comments_open() || $comment_count['approved'] > 0 ) : ?>
        <a href="<?php comments_link(); ?>"><?php comments_number('No comments yet','1 comment','% comments'); ?></a>
      <?php else : ?>
        <em>Comments off</em>
      <?php endif; ?>
      </li>
    <?php if ( get_option('mozhacks_share_posts') ) : ?>
      <li class="share"><div class="socialshare" data-type="small-bubbles"></div></li>
    <?php endif; ?>
    </ul>
  </div>
</div><!-- /#content-head -->

<main id="content-main" class="hfeed">
  <article class="post" role="article">
    <?php the_content('Read more &hellip;'); ?>
    <footer class="entry-meta">
      <p>Posted by <?php if (function_exists(coauthors_posts_links)) : coauthors_posts_links(); else : the_author_posts_link(); endif; ?> 
      on <time datetime="<?php the_time('Y-m-d\TH:i:sP'); ?>"><?php the_time(get_option('date_format')); ?></time> 
      at <time datetime="<?php the_time('TH:i:sP'); ?>"><?php the_time(get_option('time_format')); ?></time></p>
    <?php if ( get_option('mozhacks_share_posts') ) : ?>
      <div class="share"><div class="socialshare" data-type="small-bubbles"></div></div>
    <?php endif; ?>
    </footer>
  </article>

    <?php wp_link_pages(array('before' => '<p class="pages"><b>Pages:</b> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

    <?php endwhile; ?>

    <?php comments_template(); ?>

  <?php else : ?>

  <h1 class="page-title">Sorry, we couldn&#8217;t find that</h1>
  <p>We looked everywhere, but we couldn&#8217;t find the page or file you were looking for. A few possible explanations:</p>
  <p><img src="<?php bloginfo('stylesheet_directory'); ?>/img/empty.png" width="390" height="390" alt="" class="alignright" /></p>
  <ul>
    <li>You may have followed an out-dated link or bookmark.</li>
    <li>If you entered the address by hand, you may have mistyped it.</li>
    <li>You might have just discovered an error. Congratulations!</li>
  </ul>

<?php endif; ?>
</main><!-- /#content-main -->

<div id="content-sub">
  <ul id="widgets">
  <li class="widget author">
<?php if (function_exists(coauthors)) : ?>
  <?php $authors = get_coauthors($post->ID); ?>
    <h3>About the <?php if (count($authors) > 1 ) : echo "Authors"; else : echo "Author"; endif; ?></h3>
    <?php foreach ($authors as $author) : ?>
    <div class="vcard">
      <h4 class="fn">
      <?php if($author->user_url) : ?>
        <a class="url" href="<?php echo $author->user_url; ?>" rel="external me"><?php echo $author->display_name; ?>
      <?php else : ?>
        <a class="url" href="<?php echo get_author_posts_url($author->ID); ?>"><?php echo $author->display_name; ?>
      <?php endif; ?>
      <?php if (function_exists('get_avatar')) : echo ('<span class="photo">'.get_avatar( $author->user_email, 48 ).'</span>'); endif; ?>
      </a></h4>
    <?php if ($author->description) : ?>
      <p><?php echo $author->description; ?></p>
    <?php endif; ?>
    <?php echo dw_get_author_meta($author->ID); ?>
      <p><a class="url" href="<?php echo get_author_posts_url($author->ID); ?>">Read more articles by <?php echo $author->display_name; ?>&hellip;</a></p>
    </div>
  <?php endforeach; ?>
<?php else : /* if the plugin is disabled, fall back to single author */ ?>
    <h3>About the Author</h3>
    <div class="vcard">
      <h4 class="fn">
      <?php if (get_the_author_meta('user_url')) : ?>
        <a class="url" rel="external me" href="<?php the_author_meta('user_url'); ?>"><?php the_author(); ?>
        <?php if (function_exists('get_avatar')) : echo ('<span class="photo">'.get_avatar( get_the_author_meta('user_email'), 48 ).'</span>'); endif; ?>
        </a>
      <?php else : ?>
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?>
        <?php if (function_exists('get_avatar')) : echo ('<span class="photo">'.get_avatar( get_the_author_meta('user_email'), 48 ).'</span>'); endif; ?>
        </a>
      <?php endif; ?>
      </h4>
      <?php if (get_the_author_meta('description')) : ?>
      <p><?php the_author_meta('description'); ?></p>
      <?php endif; ?>
       <?php echo dw_get_author_meta(); ?>
      <p><a class="url" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">Read more articles by <?php the_author(); ?>&hellip;</a></p>
    </div>
<?php endif; ?>
  </li><?php // end author module ?>

  <li class="widget categories">
    <h3>Articles by Category</h3>
    <ul class="cat-list" role="navigation">
     <?php wp_list_categories('show_count=1&hierarchical=0&depth=1&title_li='); ?>
    </ul>
  </li>
  </ul>
</div><!-- /#content-sub -->
<?php get_footer(); ?>
