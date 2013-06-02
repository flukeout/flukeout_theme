<!-- This contains the list of topics -->

<div class="Sidebar">

    <h2>Categories</h2>
    <ul class="Categories">
      <?php wp_list_categories('orderby=count&order=DESC&show_count=1&title_li='); ?>
    </ul>

    <!-- <?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?> -->

    <?php /* If this is a 404 page */ if (is_404()) { ?>
        
    <?php /* If this is a category archive */ } elseif (is_category()) { ?>


    <?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
    <p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
    for the day <?php the_time('l, F jS, Y'); ?>.</p>

    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
    for <?php the_time('F, Y'); ?>.</p>

    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
    for the year <?php the_time('Y'); ?>.</p>

   <?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
    <p>You have searched the <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
    for <strong>'<?php echo wp_specialchars($s); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>

    <?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <p>You are currently browsing the <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives.</p>

    <?php } ?>


    <?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>

     
    <?php } ?>

</div>

