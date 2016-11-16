<?php
/**
 * @package WordPress
 * @subpackage Proper-Bear-WordPress-Theme
 * @since Proper Bear 1.0
 */
?>
<!doctype html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php if (is_search()) echo '<meta name="robots" content="noindex, nofollow" />';?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="site-wrapper">

		<div class="site-header-wrapper">
			<header class="site-header" role="banner">
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</header>
		</div>

		<?php get_template_part('menu', 'primary' ); ?>

		<div class="site-content-wrapper">

