<?php get_header(); ?>
<div class="fixed-nav-padding">
<section class="content-searchpage" role="main">
<?php if ( have_posts() ) : ?>
<header class="post-header">
<div class="title"<h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'blankslate' ), get_search_query() ); ?></h1></div>
</header>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry-search'); ?>
<?php endwhile; ?>
<?php get_template_part( 'nav', 'below' ); ?>
<?php else : ?>
<article class="post-0" class="post no-results not-found">
<header class="post-header">
<h2 class="entry-title"><?php _e( 'Nothing Found', 'blankslate' ); ?></h2>
</header>
<section class="entry-content">
<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?></p>
<?php get_search_form(); ?>
</section>
</article>
<?php endif; ?>
</section>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
