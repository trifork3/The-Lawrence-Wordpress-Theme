<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<!-- To load high-res icons for every device-->
<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
<link rel="icon" type="image/png" href="/favicon-196x196.png" sizes="196x196">
<link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160">
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<meta name="msapplication-TileColor" content="#b91d47">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">


<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>

<!-- ------------ Google Analytics tracking code-------------------------- -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-52389566-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');
</script>

<!-- ----------------- Font Awesome -------------------------------------- -->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


<script type="text/javascript" async src="wordpress/javascript/mobile_nav_menu.js"></script>

</head>

<body <?php body_class(); ?>>

<div class="wrapper">
<!-- closing tag found in footer.php  -->

<div class="header" id="header" >

<div class="menu-pages-container-desktop">

  <div class="search-desktop">
    <?php get_search_form(); ?>
  </div>
<?php wp_nav_menu( array( 'theme_location' => 'pages-menu', ) );?>
</div>

<div class="logo">
	<div onclick="toggleMenu()" class="hamburger-icon">
              	<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="30px" height="25px" viewBox="0 0 30 25" enable-background="new 0 0 64 64" xml:space="preserve">
              <g>

                  <rect x="4" y="5" fill="white" width="26" height="3"/>

                  <rect x="4" y="12" fill="white" width="26" height="3"/>

                  <rect x="4" y="19" fill="white" width="26" height="3"/>

              </g>
              </svg>
	</div>
  <div onclick="toggleSearch()" class="mobile-search">
    <svg height="35" width="35">
      <circle cx="16" cy="16" r="11" stroke="white" stroke-width="3" fill="transparent"/>
       <line x1="25" y1="25" x2="32" y2="32" stroke="white" stroke-width="4" stroke-linecap="round"/>
    </svg>
  </div>

    <a href="<?php echo get_option('home'); ?>/"><img src="http://www.thelawrence.org/the-lawrence-logo-white-compressed.png"/></a>
	<div class="mobile-search-box" id="mobile-search-box">
     <?php get_search_form(); ?>
   </div>
</div>

	<div class="logo-desktop">
    <a href="<?php echo get_option('home'); ?>/"><img src="/the-lawrence-logo-red-compressed.png" title="" /></a>
	</div>


<div class="category-menu" id="category-menu" role="navigation" >

	<?php $defaults = array(
    'theme_location'  => 'category-menu',
    'container'       => 'ul',
    'container_class' => '',
    'container_id'    => 'category-menu-list',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="%1$s" class="%2$s">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
	); ?>
	<?php wp_nav_menu( $defaults ); ?>

</div>


<div class="menu-pages-container-mobile" id="menu-pages-container-mobile">
	<?php wp_nav_menu( array( 'theme_location' => 'pages-menu', ) );?>
</div>
</div>

<div class="black-logo-for-print"> <img src="http://www.thelawrence.org/the-lawrence-logo-black-compressed.png"/></div>
