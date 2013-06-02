<?php get_header(); ?>

<!-- Sets the current category to null for the thumbnail viewer -->
<script language="javascript" type="text/javascript">
  $.cookie("category", null);
</script>

<div id="content">
    
  <?php if (have_posts()) : ?>
    <div class="Posts">
    <?php get_template_part( 'loop', 'index' ); ?> <!-- put loop into separate template file -->
    </div><!-- /Posts -->

  	<div class="Navigation">
  		<div class="Previous"><?php next_posts_link('Keep Going &rarr;') ?></div>
  		<div class="Next"><?php previous_posts_link('&larr; Back') ?></div>
  	</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
	
    <!-- <?php include (TEMPLATEPATH . "/searchform.php"); ?> -->

	<?php endif; ?>

</div><!-- / content -->

<?php get_sidebar('resources'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>