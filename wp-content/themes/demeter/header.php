<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php global $theme_option; ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!-- Favicons
	================================================== -->
	<?php if(!empty($theme_option['favicon']['url'])){ ?>
		<link rel="shortcut icon" href="<?php echo esc_url($theme_option['favicon']['url']); ?>" type="image/png">
	<?php } ?>
	<?php if(!empty($theme_option['apple_icon']['url'])){ ?>
		<link rel="apple-touch-icon" href="<?php echo esc_url($theme_option['apple_icon']['url']); ?>">
	<?php } ?>
	<?php if(!empty($theme_option['apple_icon_72']['url'])){ ?>
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url($theme_option['apple_icon_72']['url']); ?>">
	<?php } ?>
	<?php if(!empty($theme_option['apple_icon_114']['url'])){ ?>
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url($theme_option['apple_icon_114']['url']); ?>">
	<?php } ?>
	
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<div id="menu-wrap" class="menu-back cbp-af-header">
		<div class="section boxed-width-menu">
			<a href="<?php echo home_url(); ?>"><div class="logo"></div></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb'    => false, 'container' => '', 'menu_class' => 'slimmenu' ) ); ?>			
		</div>
	</div>		