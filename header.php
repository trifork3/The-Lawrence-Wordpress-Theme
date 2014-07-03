<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="entire-window-wrapper" class="hfeed">

<div id="header" >

<div id="logo">
	<div onclick="toggleMenu()" 
 class="hamburger-icon">
	<p >☰</>
	</div>
    <a href="<?php echo get_option('home'); ?>/"><img src="https://www.dropbox.com/s/hb05aed512eloe9/lawrence%20white.svg?dl=1"" title="" /></a>
</div>


<div id="menu" role="navigation">
	<!-- <div id="search">
		<?php get_search_form(); ?>
	</div> -->

	  <?php $defaults = array(
    'theme_location'  => '',
    'menu'            => 'TopMenu', 
    'container'       => 'ul', 
    'container_class' => '', 
    'container_id'    => 'category-menu',
    'menu_class'      => 'category-menu', 
    'menu_id'         => 'category-menu',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
); ?>
<?php wp_nav_menu( $defaults ); ?>  
</div>

<script type="text/javascript" src="wordpress/javascript/mobile_nav_menu.js"></script>

<script type="text/javascript" src="http://localhost:8888/wordpress/javascript/header_shadow.js"></script>

<script> function theFunction(){
	if(jQuery(window).scrollTop() == 0){
	jQuery('.logo').css('padding-top', '100px');
	}
	else{
	jQuery('.header').css('box-shadow', '0px 0px 0px #888');
	}
</script>
</div>
<div id="header-wrapper"></div>
<!-- <div id="content-container"> -->
<!-- Moved to entry.php-->
