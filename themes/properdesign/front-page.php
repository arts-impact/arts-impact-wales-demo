<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package proper
 */

get_header(); ?>

<div class="site-content">

	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="mission">
				<?php the_content(); ?>
			</div>

		<?php endwhile; // end of the loop. ?>

	</main>

	<nav class="module nav">
		<a href="#dropusaline">Drop us a line.</a>
		Read our <a href="<?php echo get_permalink(get_page_by_path('blog'));?>">blog</a>.
		<!-- See our <a href="<?php echo get_permalink(get_page_by_path('clients'));?>">clients</a>. -->
	</nav>

	<?php get_template_part( 'content-team' ); ?>


</div>

<?php get_footer(); ?>
