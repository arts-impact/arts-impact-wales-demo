<?php
/**
 * @package WordPress
 * @subpackage Proper-Bear-WordPress-Theme
 * @since Proper Bear 1.0
 */
 get_header(); ?>

 <div class="site-content">

	<?php if (have_posts()) : ?>

		<h2><?php _e('Search Results','properbear'); ?></h2>
		<?php the_posts_pagination(); ?>

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>
				<?php posted_on(); ?>
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>
			</article>

		<?php endwhile; ?>
		<?php the_posts_pagination(); ?>

	<?php else : ?>

		<h2><?php _e('Nothing Found','properbear'); ?></h2>

	<?php endif; ?>

</div>

<?php get_footer(); ?>
