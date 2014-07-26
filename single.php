<?php get_header(); ?>
<div class="fixed-nav-padding">
<div class="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?> 
<!-- <?php if ( ! post_password_required() ) comments_template( '', true ); ?> 
<!-- Remove comments from the website*/ -->
<?php endwhile; endif; ?>
<footer class="footer">
<!-- <?php get_template_part( 'nav', 'below-single' ); ?> -->
	</footer>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
