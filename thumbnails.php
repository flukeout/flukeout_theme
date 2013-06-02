<div class="PostThumbnailsWrapper">

  <?php
    global $wp_query;
    $currentPostID = $wp_query->post->ID;
  ?>

  <script language="javascript" type="text/javascript">
    var currentPostID = <?php echo $currentPostID ?>;
  </script>


  <!-- This sets (or retrieves) the last browsed category.
  Can't set cookies with PHP for some reason (wordpress conflict?) -->
  <?php

   if ( is_single() ) {
     $cur_cat_id = ($_COOKIE["category"]); // this is borken
   }

  if (is_category()) { 
    $cur_cat_id = get_cat_id( single_cat_title("",false) ); ?>
    <script language="javascript" type="text/javascript">
    $.cookie("category", <?php echo $cur_cat_id; ?>, {expires : 7 , path : '/'});
    </script>
  <?php } ?>
      
  <h2>Latest Posts
    <?php if($cur_cat_id) {?>
    <span class="Meta"> in <?php  echo get_cat_name( $cur_cat_id);  ?></span>
    <?php } ?>
  </h2>
  
  
  <div class="PostThumbnails">

    <?php
    global $post;
    $args = array( 'numberposts' => -1, 'category' => $cur_cat_id ,'offset'=> 1, 'orderby' => date);
    $myposts = get_posts( $args );

    //Filtering the thumbnail out of the $content source - grabbing just the first <img> tag in there

    function thumbnail_filter($content){
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
      $first_img_url = $matches [1] [0];      
      return $first_img_url;        
    }

    add_filter('the_content','thumbnail_filter');
    
    foreach( $myposts as $post ) :	setup_postdata($post); ?>

      <a class="PostLink" post_id="<?php the_id(); ?>" href="<?php the_permalink(); ?>">
        <img src="<?php the_content(); ?>" />
      </a>

    <?php 
    
    endforeach; 

    remove_filter('the_content','thumbnail_filter');
    
    ?>

  </div>
  
  <div class="ThumbNav">
    <a id="previous" href="#">&larr; Back</a>
    <a id="next" href="#">More &rarr;</a>
  </div>

</div>
