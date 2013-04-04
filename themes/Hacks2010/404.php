<?php get_header(); ?>

<header id="content-head">
  <h1 class="page-title">Sorry, we couldn&#8217;t find that</h1>
</header>

<main id="content-main">
  <div class="fail post">
    <p>We looked everywhere, but we couldn&#8217;t find the page or file you were looking for. A few possible explanations:</p>
    <ul>
      <li>You may have followed an out-dated link or bookmark.</li>
      <li>If you entered the address by hand, you may have mistyped it.</li>
      <li>You might have just discovered an error. Congratulations!</li>
    </ul>

    <h2>So what do we do now?</h2>
    <ul>
      <li>Go to the <a href="<?php bloginfo('url'); ?>">home page</a>.</li>
      <li><a href="#s">Search</a> hacks.mozilla.org.</li>
      <li>Check out <a href="<?php echo get_permalink(get_page_by_path('demos')->ID); ?>">our demos</a>.</li>
    </ul>
  </div>
</main><!-- /#content-main -->

<?php get_footer(); ?>