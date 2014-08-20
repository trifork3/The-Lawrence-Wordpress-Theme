<div class="post-summary">
<?php edit_post_link(); ?>
<div class="post-header">
<div class="post-category"><?php _e( '', 'blankslate' ); ?><?php the_category( ', ' ); ?></div>

<div class="title"><h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h1> </div>
<?php get_template_part( 'entry', 'meta' ); ?>
</div>
<?php get_template_part( 'entry-first-img' ); ?>
<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
</div>
<div class="divider"></div>
