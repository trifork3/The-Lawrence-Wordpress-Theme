
<?php $my_query = new WP_Query('category_name=speaker-of-the-house&posts_per_page=1');
  while ($my_query->have_posts()) : $my_query->the_post();
  $do_not_duplicate_speaker_of_the_house = $post->ID;?>
    <!-- Do stuff... -->
    <div class="post-label">SPEAKER OF THE HOUSE</div>

     <div class="featured-post-content">
    	<?php get_template_part( 'entry-title' ); ?>
    	<?php get_template_part( 'entry-meta' ); ?>
    	<?php get_template_part( 'entry-first-img' ); ?>
    	<p><?php excerpt_length(200); ?></p>
    </div>
    
  <?php endwhile; ?>
   