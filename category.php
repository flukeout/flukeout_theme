<!-- Shows posts in one category -->
<?php get_header(); ?>

<h2 class="CategoryHeader">
  This is stuff filed under <span class="CategoryName"><?php single_cat_title(' '); ?></span>.
</h2>

<div id="content" class="narrowcolumn">


  <?php if (have_posts()) : ?>


		<?php while (have_posts()) : the_post(); ?>

		<div class="Post" id="post-<?php the_ID(); ?>">
	
		<h2 class="PostTitle">
		  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
	
		<div class="PostDate">
      <?php the_time('F jS, Y') ?>, by <?php the_author() ?>
    </div>
    
    <div class="PostComments">
      <?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?>
    </div>

		<div class="PostBody">
			<?php the_content('Read the rest of this entry &raquo;'); ?>
		</div>

		<p class="PostMeta">Posted in <?php the_category(', ') ?> <?php edit_post_link('Edit', '(', ')'); ?>  </p>
	
	</div><!-- /Post -->

		<?php endwhile; ?>

	<div class="Navigation">
		<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
		<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
	</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
	
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>


<?php get_sidebar('resources'); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>