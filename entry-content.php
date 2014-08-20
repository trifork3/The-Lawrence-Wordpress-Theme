<!-- <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?> -->
<!-- Don't use image thumbnails, the theme automatically grabs the first image as the thumbnail-->
<div class="post-body">
<?php the_content(); ?>
</div>
<div class="entry-links"><?php wp_link_pages(); ?></div>
