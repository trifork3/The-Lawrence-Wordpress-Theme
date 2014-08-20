<div class="featured-img">
	<?php if ( get_the_post_thumbnail($post_id) != '' ) {
	echo  the_post_thumbnail('large');
	}
	else {;
	echo '<img src="';
	echo catch_that_image();
	echo '" alt="" />';
	}?>
</div>
