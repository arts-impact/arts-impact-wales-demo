<?php 

//Looks for, lists and links to any pages using 

$thisguy = get_the_id();

$styleguides_args = array(
  'post_type'   => 'page',
  'meta_key'    => '_wp_page_template',
  'meta_value'  => 'template-styleguide.php'

  );

$styleguides = get_posts($styleguides_args);

?>

<?php if($styleguides): ?>
  <nav class="sg-nav">
  <?php foreach ($styleguides as $styleguide):
    $sg_link = get_permalink( $styleguide );
    $thatguy = $styleguide->ID;

    if($thatguy == $thisguy):
      $current_class = 'sg-current';
    else:
      $current_class = '';
    endif;

    ?>
    <a class="sg-nav-item <?=$current_class;?>" href="<?=$sg_link; ?>"><?=$styleguide->post_title; ?></a>
  <?php endforeach; ?>
  </nav>
<?php endif; ?>