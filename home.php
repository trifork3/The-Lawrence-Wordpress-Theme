
<?php get_header(); ?> 
<section class="content-homepage" role="main">
<?php $my_query = new WP_Query('category_name=featured-2&posts_per_page=1');
  while ($my_query->have_posts()) : $my_query->the_post();
  $do_not_duplicate = $post->ID;?>
    <!-- Do stuff... -->
     <div class="featured-post">
        <?php get_template_part( 'entry-first-img' ); ?>
    	<?php get_template_part( 'entry-excerpt' ); ?>
    	<div class="excerpt-small-screen">
    	<p><?php excerpt_length(500); ?></p>
    	</div>
		<div class="excerpt-large-screen">
			<p><?php excerpt_length(500); ?></p>
		</div>
    </div>
    
    
  <?php endwhile; ?>
   
<!-- --------------------------------------------------------------------------------- --> 
   
<div class="featured-section-news-wrapper">

<div class="featured-section-header"> 
<div class="featured-section-header-grey"><a href="category/News">More News</a>
</div>
</div>

<div class="featured-section" >
<div class="featured-section-news">
<?php $my_query = new WP_Query('category_name=news&posts_per_page=7');
  while ($my_query->have_posts()) : $my_query->the_post();
    if( $post->ID == $do_not_duplicate ) continue;?>
    <!-- Do stuff... -->
         <div class="featured-post-content"> 
		<!--<div class="category-flex-wrap"> -->
    	<?php get_template_part( 'entry-title' ); ?>
    	
		<!-- </div> -->
    
		
		<?php get_template_part( 'entry-meta' ); ?>
		<p><?php excerpt(30); ?></p>


    </div>    
  <?php endwhile; ?>    
        </div>
        </div>
        </div>
<div class="bottom-border-double"> </div>
<!-- --------------------------------------------------------------------------------- --> 


<?php $my_query = new WP_Query('category_name=editorial&posts_per_page=1');
  while ($my_query->have_posts()) : $my_query->the_post();
  if( $post->ID == $do_not_duplicate ) continue;?>
    <!-- Do stuff... -->
<?php $authorname = get_post_meta(get_the_ID(),'_my_meta_value_key', true);?>
  <?php endwhile; ?>   



<div class="featured-section-editorial-wrapper">

<div class="featured-section-header">
<div class="featured-section-header-grey"><a href="category/editorial"><a>Editorial • By <?php the_author()?></a></div> 
<div class="featured-section-header-editorial-short"><a href="category/editorial">EDITORIAL</a></div>
</div>

<div class="featured-section">
<?php $my_query = new WP_Query('category_name=editorial&posts_per_page=1');
  while ($my_query->have_posts()) : $my_query->the_post();
  if( $post->ID == $do_not_duplicate ) continue;?>
    <!-- Do stuff... -->
    	<?php get_template_part( 'entry-excerpt' ); ?>

    	<div class="featured-post-content"> 
    	<p><?php excerpt_length(400); ?></p>

    	<?php get_template_part( 'entry-first-img' ); ?>

    </div>    
    
  <?php endwhile; ?>    
        </div>
        <div class="bottom-border-double"></div>
		</div>


        
        
<!-- --------------------------------------------------------------------------------- --> 

<div class="featured-section-opinions-wrapper">
<div class="featured-section-header"> <div class="featured-section-header-red"><a href="category/opinions">Opinions</a></div></div>
<div class="featured-section" class="featured-section-opinions">


<?php $my_query = new WP_Query('category_name=jimposium&posts_per_page=1');
  while ($my_query->have_posts()) : $my_query->the_post();
  $do_not_duplicate = $post->ID;?>
    <!-- Do stuff... -->
    <div class="post-label">JIMPOSIUM</div>
     <div class="featured-post-content">
        <?php get_template_part( 'entry-first-img' ); ?>
    	<?php get_template_part( 'entry-title' ); ?>
    	<?php get_template_part( 'entry-meta');?>
    	<p><?php excerpt_length(200); ?></p>
    </div>
    
    
  <?php endwhile; ?>



<?php $my_query = new WP_Query('category_name=speaker-of-the-house&posts_per_page=1');
  while ($my_query->have_posts()) : $my_query->the_post();
  $do_not_duplicate_speaker_of_the_house = $post->ID;?>
    <!-- Do stuff... -->
    <div class="post-label">SPEAKER OF THE HOUSE</div>

     <div class="featured-post-content">
        <?php get_template_part( 'entry-first-img' ); ?>
    	<?php get_template_part( 'entry-excerpt' ); ?>
    	<p><?php excerpt_length(200); ?></p>
    </div>
    
    
  <?php endwhile; ?>



<?php $my_query = new WP_Query('category_name=opinions&posts_per_page=5');
  while ($my_query->have_posts()) : $my_query->the_post();
  if( $post->ID == $do_not_duplicate or $post->ID == $do_not_duplicate_speaker_of_the_house ) continue;?>
    <!-- Do stuff... -->
     	<li class = "post-title-large-screen">
    	<?php get_template_part( 'entry-excerpt' ); ?>
    	</li>
    	

    	
    	<div class="featured-post-content-mobile"> 
    	<?php get_template_part( 'entry-excerpt' ); ?>

    	<?php get_template_part( 'entry-first-img' ); ?> 


    </div>    
    
  <?php endwhile; ?>    
        </div>
        <div class="bottom-border-double"></div>
</div>


<!-- --------------------------------------------------------------------------------- --> 
<div class="featured-section-arts-wrapper">

<div class="featured-section-header"> <div class="featured-section-header-red"><a href="category/arts">Arts</a></div></div>
<div class="featured-section" class="featured-section-arts">
<?php $my_query = new WP_Query('category_name=arts&posts_per_page=5');
  while ($my_query->have_posts()) : $my_query->the_post();
  if( $post->ID == $do_not_duplicate ) continue;?>
    <!-- Do stuff... -->
         	<div class="featured-post-content"> 

     
    	<?php get_template_part( 'entry-excerpt' ); ?>
    	
    	
            	<?php get_template_part( 'entry-first-img' ); ?>

    </div>    
    
  <?php endwhile; ?>    
        </div>
                <div class="bottom-border-double"></div>

        </div>
<!-- --------------------------------------------------------------------------------- --> 

<div class="featured-section-features-wrapper">

<div class="featured-section-header"> <div class="featured-section-header-red"><a href="category/features">Features</a></div></div>
<div class="featured-section">
<?php $my_query = new WP_Query('category_name=features&posts_per_page=5');
  while ($my_query->have_posts()) : $my_query->the_post();
  if( $post->ID == $do_not_duplicate ) continue;?>
    <!-- Do stuff... -->
         	<div class="featured-post-content"> 

    	<?php get_template_part( 'entry-excerpt' ); ?>
    	
    	
            	<?php get_template_part( 'entry-first-img' ); ?>

    </div>    
    
  <?php endwhile; ?>    
        </div>
                        <div class="bottom-border-double"></div>

        </div>

<!-- --------------------------------------------------------------------------------- --> 

<div class="featured-section-sports-wrapper">

<div class="featured-section-header"> <div class="featured-section-header-red"><a href="category/Sports">Sports</a></div></div>
<div class="featured-section" class="featured-section-sports">
<?php $my_query = new WP_Query('category_name=sports&posts_per_page=5');
  while ($my_query->have_posts()) : $my_query->the_post();
  if( $post->ID == $do_not_duplicate ) continue;?>
         <div class="featured-post-content"> 

    	<?php get_template_part( 'entry-excerpt' ); ?>
    	
    	<?php get_template_part( 'entry-first-img' ); ?>

    </div>    
    
  <?php endwhile; ?>    
        </div>
        </div>
        
<!-- --------------------------------------------------------------------------------- --> 

<body onmouseover="adjustdivheight()">

</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

