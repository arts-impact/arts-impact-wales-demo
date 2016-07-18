<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package proper
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="IE=edge" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php include_once get_stylesheet_directory() . '/inc/favicons.php'; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php include_once get_stylesheet_directory() . '/img/icons.svg'; ?>
<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="site-wrapper">
	<div class="site-header-wrapper">
		<header class="site-header">
		<!-- <svg class="header-logo"><use xlink:href="img/proper-logo.svg"></use></svg> -->
			<a href="<?php echo site_url();?>" alt="Proper Design&rsquo;s logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/proper-logo.svg" alt="Proper Design Logo" class="header-logo"></a>
		</header>
	</div>

	<div class="site-content-wrapper">