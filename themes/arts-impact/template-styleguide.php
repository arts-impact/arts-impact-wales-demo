<?php
/**
 * Template Name: Styleguide
 * @package WordPress
 * @subpackage Proper-Bear-WordPress-Theme
 * @since Proper Bear 1.0
 */
 get_header();

 ?>

 <div class="site-content">

  <?php get_template_part('styleguide', 'nav'); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<main <?php post_class(); ?> id="page-<?php the_ID(); ?>">
			<?php the_title('<h1>', '</h1>'); ?>
      <?php the_content(); ?>

      <ul class="tablist" role="tablist">
        <li id="sg-tab1" class="tab" aria-controls="sg-panel1" role="tab" aria-selected="true">Brand</li>
        <li id="sg-tab2" class="tab" aria-controls="sg-panel2" role="tab" aria-selected="false">HTML Elements</li>
        <li id="sg-tab3" class="tab" aria-controls="sg-panel3" role="tab" aria-selected="false">Forms</li>
        <li id="sg-tab4" class="tab" aria-controls="sg-panel4" role="tab" aria-selected="false">Prototype</li>
        <li id="sg-tab5" class="tab" aria-controls="sg-panel5" role="tab" aria-selected="false">Templates</li>
      </ul>

      <div id="sg-panel1" class="sg-tabpanel" aria-labelledby="sg-tab1" role="tabpanel" aria-hidden="false">
        <?php get_template_part('styleguide', 'custom' ); ?>
      </div>
       <div id="sg-panel2" class="sg-tabpanel" aria-labelledby="sg-tab2" role="tabpanel" aria-hidden="true">
        <?php get_template_part('styleguide', 'tags' ); ?>
      </div>
       <div id="sg-panel3" class="sg-tabpanel" aria-labelledby="sg-tab3" role="tabpanel" aria-hidden="true">
        <?php get_template_part('styleguide', 'forms' ); ?>
      </div>

       <div id="sg-panel4" class="sg-tabpanel" aria-labelledby="sg-tab4" role="tabpanel" aria-hidden="true">
        <?php get_template_part('styleguide', 'prototype' ); ?>
      </div>

       <div id="sg-panel5" class="sg-tabpanel" aria-labelledby="sg-tab5" role="tabpanel" aria-hidden="true">
        <?php get_template_part('styleguide', 'templates' ); ?>
      </div>


      <?php wp_link_pages(array('before' => __('Pages: ','properbear'), 'next_or_number' => 'number')); ?>
			<?php edit_post_link(__('Edit this entry','properbear'), '<p>', '</p>'); ?>
		</main>

		<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>