<?php get_header(); ?>
<div class="fixed-nav-padding" role="main">
<div class="category-title"><?php _e( '', 'blankslate' ); ?><?php single_cat_title(); ?></div>
<div class="category-page-wrapper"
<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 <div class="category-post">
    	<div class="category-post-title"> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
    	   <?php get_template_part( 'entry-meta' ); ?>

            <?php if ( get_the_post_thumbnail($post_id) != '' ) {
			echo  the_post_thumbnail();
			}	 
			else {;
 			echo '<img src="';
 			echo catch_that_image();
 			echo '" alt="" />';
			}?> 

    	    <?php excerpt_length(300); ?>

<div class="bottom-border"></div>

<?php endwhile; endif; ?>
</div>

<?php get_template_part( 'nav', 'below' ); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

   
