<?php while (have_posts()) : the_post(); ?>

	<div class="Post" id="post-<?php the_ID(); ?>">

    <div class="RedditLink"><!-- <script type="text/javascript" src="http://www.reddit.com/static/button/button2.js"></script> -->        </div>

		<h2 class="PostTitle">
		  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>


    <div class="TitleMeta">
  		<span class="PostDate"><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></span>
      <span class="PostComments"><?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?></span>
		</div>
		
    <div class="PostBody"><?php the_content('Read the rest of this entry &raquo;'); ?></div>
		<div class="PostMeta">
		  <span class="Share">
		    <?php if (function_exists('sociable_html')) {
            echo sociable_html();
        } ?>
		  </span>
		  Filed under <?php the_category(', ') ?> <?php edit_post_link('Edit', '(', ')'); ?>
		</div>

	</div><!-- .post -->

<?php endwhile; ?>