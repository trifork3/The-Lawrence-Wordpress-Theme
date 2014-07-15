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

<div id="header-wrapper">
<div id="header" >


<div id="menu-pages-container-desktop">
<?php wp_nav_menu( array( 'theme_location' => 'extra-menu', ) );?>

</div>

<div id="logo">
	<div onclick="toggleMenu()" class="hamburger-icon">
	<p>☰</p>
	</div>
    <a href="<?php echo get_option('home'); ?>/"><img src="http://localhost:8888/wordpress/wp-content/uploads/2014/07/the-lawrence-logo-white-compressed.png" title="" /></a>
	
</div>


	<div id="logo-desktop">
    	<a href="<?php echo get_option('home'); ?>/"><img src="http://localhost:8888/wordpress/wp-content/uploads/2014/07/the-lawrence-logo-black-compressed.png" title="" /></a>
	</div>

<div id="category-menu" role="navigation" >

	<?php $defaults = array(
    'theme_location'  => '',
    'menu'            => 'TopMenu', 
    'container'       => 'ul', 
    'container_class' => '', 
    'container_id'    => 'category-menu-list',
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
	

<div id="menu-pages-container-mobile">
	<?php wp_nav_menu( array( 'theme_location' => 'extra-menu', ) );?>
</div>
<script type="text/javascript" src="wordpress/javascript/mobile_nav_menu.js"></script>

<script type="text/javascript" src="wordpress/javascript/header_shadow.js"></script>

</div>
</div>
<!--
	<div id="search">
		<?php get_search_form(); ?> 
	</div> -->

