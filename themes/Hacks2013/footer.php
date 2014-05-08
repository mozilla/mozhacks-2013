</div><!-- /#content -->

<footer id="site-info">
  <nav id="nav-legal">
    <ul>
      <li><a href="http://www.mozilla.org/privacy/websites/" rel="external">Privacy Policy</a></li>
      <li><a href="http://www.mozilla.org/about/legal.html" rel="external">Legal Notices</a></li>
      <li><a href="http://www.mozilla.org/legal/fraud-report/" rel="external">Report Trademark Abuse</a></li>
    </ul>
  </nav>

  <p id="copyright">Except where otherwise noted, content on this site is licensed under the <br /><a href="http://creativecommons.org/licenses/by-sa/3.0/" rel="license external">Creative Commons Attribution Share-Alike License v3.0</a> or any later version.</p>

  <nav id="nav-footer">
    <h5>hacks.mozilla.org:</h5>
    <ul role="navigation">
      <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
      <li><a href="<?php echo get_permalink(get_page_by_path('articles')->ID); ?>">Articles</a></li>
      <li><a href="<?php echo get_permalink(get_page_by_path('demos')->ID); ?>">Demos</a></li>
      <li><a href="<?php echo get_permalink(get_page_by_path('about')->ID); ?>">About</a></li>
    </ul>
  </nav>
</footer>

<script src="https://www.mozilla.org/tabzilla/media/js/tabzilla.js"></script>
<script>
// <![CDATA[
  jQuery(document).ready(function(){
    jQuery(document.body).addClass("js");
  });
// ]]>
</script>

<?php wp_footer(); ?>
</div>
</body>
</html>
