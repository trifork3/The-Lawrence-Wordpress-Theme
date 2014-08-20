<?php get_header(); ?>
<div class="fixed-nav-padding" role="main">
<div class="content-categorypage">
<div class="category-title"> <h1><?php _e( '', 'blankslate' ); ?><?php single_cat_title(); ?></h1></div>
<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 <article class="post-summary">
    <div class="title"> <h1> <a href="<?php the_permalink() ?>" rel="bookmark"     title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></div>
    	 <?php get_template_part( 'entry-meta' ); ?>

		<?php
			$content = $post->post_content;
			$searchimages = '~<img [^>]* />~';

		/*Run preg_match_all to grab all the images and save the results in $pics*/
		preg_match_all( $searchimages, $content, $pics );

		// Check to see if we have at least 1 image
		$iNumberOfPics = count($pics[0]);

		if ( $iNumberOfPics > 0 ) {
		     //do stuff

		 			echo '<img src="';
		 			echo catch_that_image();
		 			echo '" alt="" />';
		}

		?>

    	    <p><?php excerpt_length(300); ?></p>

<div class="divider"></div>

</article>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>

</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
