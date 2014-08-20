<?php edit_post_link(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="post-header">
<div class="post-category"><?php _e( '', 'blankslate' ); ?><?php the_category( '<span class="separators"> • </span>' ); ?></div>

<div class="title"><h1 title="<?php the_title_attribute(); ?>"> <?php the_title(); ?></h1></div>

<div class="divider"></div>
<?php get_template_part( 'entry', 'meta' ); ?>
</header>
<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
</article>
