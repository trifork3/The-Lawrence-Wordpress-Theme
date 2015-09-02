<?php

/* include the file needed for the dynamic elements of the 'Recent Issues' page */
require_once( get_template_directory() . '/recent-issues-functions.php' ); 

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

//check if post has an image
function is_image() {
	$content = $post->post_content;
	$searchimages = '~<img [^>]* />~';
	/*Run preg_match_all to grab all the images and save the results in $pics*/
	preg_match_all( $searchimages, $content, $pics );
	// Check to see if we have at least 1 image
	$iNumberOfPics = count($pics[0]);
	if ( $iNumberOfPics == 0 ) {
		return false;
	}
	else {return true; }
}

function register_my_menus() {
	register_nav_menus(    array(      'category-menu' => __( 'Category Menu' ),      'pages-menu' => __( 'Pages Menu' )    )  );
}

add_action( 'init', 'register_my_menus' );

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
	} else {
	$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	echo $excerpt;
}

function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
	array_pop($content);
	$content = implode(" ",$content).'...';
	} else {
	$content = implode(" ",$content);
	}
	$content = preg_replace('/\[.+\]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	echo $content;
}?>
