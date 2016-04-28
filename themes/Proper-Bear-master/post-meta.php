<?php

// Display tags and categories

$tags_label = __('Tagged: ','properbear');
$cats_label = __('Posted in: ','properbear');

?>



<footer class="post-meta">
	<div class="post-meta-tags">
		<?php the_tags( $tags_label , ', '); ?>
	</div>

	<div class="post-meta-cats">
		<?php echo $cats_label; the_category( ', ') ?>
	</div>

</footer>