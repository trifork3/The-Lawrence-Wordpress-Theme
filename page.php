<?php get_header(); ?>
<div class="fixed-nav-padding">
<div class="content" role="main">
<?php edit_post_link(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article class="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="post-header">
<div class="title"><h1 class="title"><?php the_title(); ?></h1> </div>
<div class="divider"> </div>
</header>
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</article>
<?php endwhile; endif; ?>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>