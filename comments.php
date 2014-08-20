<?php if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) return; ?>
<section class="comments">

<?php
$comments_args = array(
        // change the title of send button
        'label_submit'=>'Post',
        // change the title of the reply section
        'title_reply'=>'Comment on This Article <span class="comment-respond-expand" id="comment-respond-expand" onclick="toggleCommentRespond()" style="display: block;"> <i class="fa fa-plus-square"></i></span> <span class="comment-respond-shrink" id="comment-respond-shrink" onclick="toggleCommentRespond()"> <i class="fa fa-minus-square"></i></span>',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_before' => '<p class="comment-notes">' .
    	__( 'Your email address will not be published. All fields are required' ) . ( $req ? $required_text : '' ) .
    	'</p>',
    	//change text before the comments
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" rows="10" aria-required="true"></textarea></p>',


  'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<p class="comment-form-author">' .
      '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
      ( $req ? '' : '' ) .
      '<br /><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size=""' . $aria_req . ' /></p>',

    'email' =>
      '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
      ( $req ? '' : '' ) .
      '<br /><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size=""' . $aria_req . ' /></p>',

    'url' =>
      ''
    )
  	),

);
if ( comments_open() ) comment_form($comments_args);
?>

<?php
if ( have_comments() ) :
global $comments_by_type;
$comments_by_type = &separate_comments( $comments );
if ( ! empty( $comments_by_type['comment'] ) ) :
?>
<section class="comments-list" class="comments">
<h3 class="comments-title"><?php comments_number(); ?></h3>
<?php if ( get_comment_pages_count() > 1 ) : ?>
<nav class="comments-nav-above" class="comments-navigation" role="navigation">
<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
</nav>
<?php endif; ?>
<ul>
<?php wp_list_comments( 'type=comment' ); ?>
</ul>
<?php if ( get_comment_pages_count() > 1 ) : ?>
<nav class="comments-nav-below" class="comments-navigation" role="navigation">
<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
</nav>
<?php endif; ?>
</section>
<?php
endif;
if ( ! empty( $comments_by_type['pings'] ) ) :
$ping_count = count( $comments_by_type['pings'] );
?>
<section class="trackbacks-list" class="comments">
<h3 class="comments-title"><?php echo '<span class="ping-count">' . $ping_count . '</span> ' . ( $ping_count > 1 ? __( 'Trackbacks', 'blankslate' ) : __( 'Trackback', 'blankslate' ) ); ?></h3>
<ul>
<?php wp_list_comments( 'type=pings&callback=blankslate_custom_pings' ); ?>
</ul>
</section>
<?php
endif;
endif;

?>
</section>
