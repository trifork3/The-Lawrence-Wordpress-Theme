<?php get_header(); ?>
<header class="header">
<div class="category-title"><?php _e( '', 'blankslate' ); ?><?php single_cat_title(); ?></div>

</header>



<?php $my_query = new WP_Query('category_name=jimposium&posts_per_page=1');
  while ($my_query->have_posts()) : $my_query->the_post();
  $do_not_duplicate = $post->ID;?>
    <!-- Do stuff... -->
     <div class="featured-columnist-post">
    	<?php get_template_part( 'entry-excerpt' ); ?>
    	
    	<div class="featured-post-content"> 
    	
            	<?php get_template_part( 'entry-first-img' ); ?>

		
    	<p><?php excerpt_length(200); ?></p>

    </div>
    </div>
    
    
    
  <?php endwhile; ?>
   






<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 <?php if( $post->ID == $do_not_duplicate ) continue;?>
 <div class="category-post">
 <div class="title-img-wrapper">
    	<div class="category-post-title"> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
    	
    	<div class="category-img">
    		<?php if ( get_the_post_thumbnail($post_id) != '' ) {
			echo  the_post_thumbnail();
			}	 
			else {;
 			echo '<img src="';
 			echo catch_that_image();
 			echo '" alt="" />';
			}?> 
		</div>
		</div>
    	<div class="category-post-content"> 
    	<?php excerpt_length(400); ?>

    </div>
    </div>
    

<?php endwhile; endif; ?>

<?php get_template_part( 'nav', 'below' ); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

   
