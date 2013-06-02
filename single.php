<?php get_header(); ?>

	<div id="content">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="Post" id="post-<?php the_ID(); ?>">

			<h2 class="PostTitle">
			 <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a>
		  </h2>

    	<div class="PostDate">
        <?php the_time('F jS, Y') ?> by <?php the_author() ?>
      </div>

      <div class="PostComments">
        <?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?>
      </div>


			<div class="PostBody">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

				<p class="PostMeta">
				
						Filed under <?php the_category(', ') ?>.

            <!-- You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed.  -->

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
              <!-- You can <a href="#respond">leave a response</a>, or  -->
              <!-- <a href="<?php trackback_url(true); ?>" rel="trackback">Trackback</a> from your own site. -->

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link('Edit this entry.','',''); ?>

				</p>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>
<?php get_sidebar('resources'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
