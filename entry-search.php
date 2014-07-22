<article class="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php edit_post_link(); ?>

<div class="post-category"><?php _e( '', 'blankslate' ); ?><?php the_category( ', ' ); ?></div>

<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h1> 

<div class="bottom-border"></div>
<?php get_template_part( 'entry', 'meta' ); ?>
</header>
<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
</article>
