<?php
/**
 * The template used for displaying blog posts in home.php
 *
 * @package proper
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="post-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
	<footer class="post-footer">
		<div class="post-byline"><?php proper_posted_on(); ?></div>
		<?php edit_post_link( __( 'Edit', 'proper' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
