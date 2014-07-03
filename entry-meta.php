<section class="entry-meta">
<!-- <span class="author vcard"><?php the_author_posts_link(); ?></span> -->

<span class="writername">
By <?php $authorname = get_post_meta(get_the_ID(),'_my_meta_value_key', true);
if( ! empty( $authorname ) ) {
  echo $authorname;
} 
?>
</span>

<span class="meta-sep">  • </span>
<span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
</section>