<?php

// The guts of a post
// Title isn't a link on singular posts

if(is_singular('post')):
	$single = true;
else:
	$single = false;
endif;


 ?>


<?php if($single): ?>
	<?php the_title('<h1>', '</h1>'); ?>
<?php else: ?>
	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<?php endif; ?>
<?php posted_on(); ?>

<?php if($single): ?>
	<?php the_content(); ?>
<?php else: ?>
	<?php the_excerpt(); ?>
<?php endif; ?>

<?php get_template_part('post', 'meta'); ?>