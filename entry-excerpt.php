<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
 <section class="featured-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></section>

 <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->

<?php get_template_part('entry-meta')?>


 <!-- Display the Post's content in a div box. -->




  
</article>
