<?php get_header(); ?>
<section class="article-list-wrap" role="main">

<header class="header">
<div class="category-title"><?php _e( '', 'blankslate' ); ?><?php single_cat_title(); ?></div>

</header>


 <div class="category-post">

<?php get_template_part('senior-columnist-1')?>
</div>
<div class="bottom-border"> </div>

 <div class="category-post">

<?php get_template_part('senior-columnist-2')?>
</div>
<div class="bottom-border"> </div>


<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 <?php if( $post->ID == $do_not_duplicate or $post->ID == $do_not_duplicate_speaker_of_the_house ) continue;?>
 <div class="category-post">
 <div class="featured-post-content">
		
		<?php get_template_part('entry-title')?>
    	<?php get_template_part('entry-meta')?>
		<!--
    	<div class="category-img">
    		<?php if ( get_the_post_thumbnail($post_id) != '' ) {
			echo  the_post_thumbnail();
			}	 
			else {;
 			echo '<img src="';
 			echo catch_that_image();
 			echo '" alt="" />';
			}?> 
		</div> -->

    	<p>
    	<?php excerpt_length(400); ?>
		</p>
    </div>
    		</div>
    
<div class="bottom-border"> </div>

<?php endwhile; endif; ?>

</section>
<!--
<?php get_template_part( 'nav', 'below' ); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?> -->

   
