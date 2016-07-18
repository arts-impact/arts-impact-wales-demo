<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package proper
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="module mission">
		<?php echo get_the_content(); ?>
		
	</div><!-- .entry-content -->
</article><!-- #post-## -->
