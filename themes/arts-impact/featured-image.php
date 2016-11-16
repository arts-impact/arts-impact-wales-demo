<?php

// Display a large featured image

// Don't link on single pages
if(!is_singular()){
	$link = true;
}else{
  $link = false;
}

$featured_img = get_the_image(array('featured' => true, 'size' => 'large', 'image_class' => 'featured-image', 'link_to_post' => $link, 'echo' => false));

if($featured_img): ?>

	<div class="featured-image-wrapper">
		<?php echo $featured_img; ?>
	</div>

<?php endif;

 ?>