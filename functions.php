<?php
	add_action( 'after_setup_theme', 'blankslate_setup' );
	function blankslate_setup(){
		load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		global $content_width;
		
		if ( ! isset( $content_width ) ) $content_width = 640;
		register_nav_menus(array( 'main-menu' => __( 'Main Menu', 'blankslate' ) ));
	}

	add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
	function blankslate_load_scripts(){
		wp_enqueue_script( 'jquery' );
	}

	add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
	function blankslate_enqueue_comment_reply_script(){
		
		if ( get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	add_filter( 'the_title', 'blankslate_title' );
	function blankslate_title( $title ) {
		
		if ( $title == '' ) {
			return '&rarr;';
		} else {
			return $title;
		}

	}

	add_filter( 'wp_title', 'blankslate_filter_wp_title' );
	function blankslate_filter_wp_title( $title ){
		return $title . esc_attr( get_bloginfo( 'name' ) );
	}

	add_action( 'widgets_init', 'blankslate_widgets_init' );
	function blankslate_widgets_init(){
		register_sidebar( array ('name' => __( 'Sidebar Widget Area', 'blankslate' ),'id' => 'primary-widget-area','before_widget' => '<li id="%1$s" class="widget-container %2$s">','after_widget' => "</li>",'before_title' => '<h3 class="widget-title">','after_title' => '</h3>',) );
	}

	
	function blankslate_custom_pings( $comment ){
		$GLOBALS['comment'] = $comment;
		?>
<li <?php  comment_class(); ?> id="li-comment-<?php  comment_ID(); ?>"><?php  echo comment_author_link(); ?></li>
<?php 
	}

	add_filter( 'get_comments_number', 'blankslate_comments_number' );
	function blankslate_comments_number( $count ){
		
		if ( !is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
			return count( $comments_by_type['comment'] );
		} else {
			return $count;
		}

	}

	/**
 * Adds a box to the main column on the Post and Page edit screens.
 */ //key is _my_meta_value_key
	function myplugin_add_meta_box() {
		$screens = array( 'post', 'page' );
		foreach ( $screens as $screen ) {
			add_meta_box('myplugin_sectionid',__( 'Writer Name', 'myplugin_textdomain' ),'myplugin_meta_box_callback',$screen);
		}

	}

	add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );
	/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
	function myplugin_meta_box_callback( $post ) {
		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );
		/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
		$value = get_post_meta( $post->ID, '_my_meta_value_key', true );
		echo '<label for="myplugin_new_field">';
		_e( '', 'myplugin_textdomain' );
		//This is to label the box, but it is not necessary to
		echo '</label> ';
		echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="' . esc_attr( $value ) . '" size="25" />';
	}

	/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
	function myplugin_save_meta_box_data( $post_id ) {
		/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */		// Check if our nonce is set.
		
		if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
			return;
		}

		// Verify that the nonce is valid.
		
		if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'myplugin_meta_box' ) ) {
			return;
		}

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Check the user's permissions.
		
		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
			
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}

		} else {
			
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}

		}

		/* OK, it's safe for us to save the data now. */		// Make sure that it is set.
		
		if ( ! isset( $_POST['myplugin_new_field'] ) ) {
			return;
		}

		// Sanitize user input.
		$my_data = sanitize_text_field( $_POST['myplugin_new_field'] );
		// Update the meta field in the database.
		update_post_meta( $post_id, '_my_meta_value_key', $my_data );
	}

	add_action( 'save_post', 'myplugin_save_meta_box_data' );
	//load jQuery
	add_action( 'wp_enqueue_script', 'load_jquery' );
	function load_jquery() {
		wp_enqueue_script( 'jquery' );
	}

	/**
 * Proper way to enqueue scripts and styles
 */
	function theme_name_scripts() {
		wp_enqueue_script( 'mobile_nav_menu', get_template_directory_uri() . '/javascript/mobile_nav_menu.js', array(jquery), '1.0.0', true );
	}

	add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
	function add_my_script() {
		wp_enqueue_script(        'header_shadow', // name your script so that you can attach other scripts and de-register, etc.
		get_template_directory_uri() . '/javascript/header_shadow.js', // this is the location of your script file
		array('jquery') // this array lists the scripts upon which your script depends
		);
	}

	add_action( 'wp_enqueue_scripts', 'add_my_script' );
	/*
 *
 * Add improved dynamic excerpt to end the excerpt with a sentence
 */

	
function excerpt_length ($length) {
	$re = '/ # Split sentences on whitespace between them.
(?<=                # Begin positive lookbehind.
  [.!?]             # Either an end of sentence punct,
| [.!?][\'"]        # or end of sentence punct and quote.
)                   # End positive lookbehind.
(?<!                # Begin negative lookbehind.
  Mr\.              # Skip either "Mr."
| Mrs\.             # or "Mrs.",
| Ms\.              # or "Ms.",
| Jr\.              # or "Jr.",
| Dr\.              # or "Dr.",
| Prof\.            # or "Prof.",
| Sr\.              # or "Sr.",
| T\.V\.A\.         # or "T.V.A.",
| St\.
					# or... (you get the idea).
)                   # End negative lookbehind.
\s+                 # Split on whitespace between sentences.
/ix';
	'er!" The T.V.A. is a big project!';
	$sentences = get_the_content();
	$sentences = preg_replace('~<blockquote(.*?)>(.*?)</blockquote>~si',"",$sentences);
	$sentences = strip_shortcodes($sentences);
	$sentences = strip_tags($sentences);
	$arraysentences = preg_split($re, $sentences, -1, PREG_SPLIT_DELIM_CAPTURE);
	$excerpt = implode (' ', $arraysentences);
	while(strlen($excerpt) > $length){
		array_pop($arraysentences);
		$excerpt = implode (' ', $arraysentences);
	}
	
	if(strlen($excerpt)<1){
		/*for situation when the first sentence is longer than the excerpt length, override and 
		 display the first sentence*/
		$sentences = get_the_content();
		$sentences = preg_replace('~<blockquote(.*?)>(.*?)</blockquote>~si',"",$sentences);
		$sentences = strip_shortcodes($sentences);
		$sentences = strip_tags($sentences);
		$arraysentences = preg_split($re, $sentences, -1, PREG_SPLIT_DELIM_CAPTURE);
		while(count($arraysentences)>1){
			array_pop($arraysentences);
		}

	}

	$excerpt = implode(' ', $arraysentences);
	echo $excerpt;
}

	//get first image in post
	function catch_that_image() {
		global $post, $posts;
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$first_img = $matches[1][0];
		return $first_img;
	}
	
	function register_my_menus() {
		register_nav_menus(    array(      'header-menu' => __( 'Header Menu' ),      'extra-menu' => __( 'Extra Menu' )    )  );
	}

	add_action( 'init', 'register_my_menus' );



if ( !function_exists( 'wpex_pagination' ) ) {
	
	function wpex_pagination() {
		
		$prev_arrow = is_rtl() ? '&rarr' : '&larr';
		$next_arrow = is_rtl() ? '&larr' : '&rarr';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
	
}