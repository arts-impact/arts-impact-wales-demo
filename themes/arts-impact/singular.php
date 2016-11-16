<?php
/**
 * @package WordPress
 * @subpackage Proper-Bear-WordPress-Theme
 * @since Proper Bear 1.0
 */
 get_header(); ?>

 <div class="site-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<main <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<?php get_template_part('featured-image'); ?>
			<?php get_template_part( 'post', 'content' ); ?>
		</main>

		<?php comments_template(); ?>

	<?php endwhile; endif; ?>

	<?php proper_post_navigation(); ?>

</div>

<?php get_footer(); ?>