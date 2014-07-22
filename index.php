<?php get_header(); ?>
<div class="featured" >

</div>

<section  class="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<!-- The loop code -->
	<?php get_template_part( 'entry' ); ?>

	<!-- <?php comments_template(); ?> -->
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
