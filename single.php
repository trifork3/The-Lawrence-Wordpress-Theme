<?php get_header(); ?>
<div class="fixed-nav-padding">
<div class="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?> 
</div>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?> 
<?php endwhile; endif; ?>
<footer class="footer">
<!-- <?php get_template_part( 'nav', 'below-single' ); ?> -->
	</footer>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
