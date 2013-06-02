<footer>
  <!-- 
  <p>
    <a href="feed:<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
    and <a href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
    <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds.
  </p> 
  -->
</footer>

</div> <!-- /#content_wrapper -->
</div>

<!-- Plugins might add stuff to the footer, so I left this in. -->
<?php wp_footer(); ?>

<!-- google analytics tracking -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-6125551-1");
pageTracker._trackPageview();
</script>
<!-- /google -->

</body>
</html>