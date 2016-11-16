<?php if(have_rows('sg_prototypes')):?>
<?php while(have_rows('sg_prototypes')): the_row();

$device = get_sub_field('sg_device');
$device_label = strtolower($device);
$device_class = array(str_replace('/', '-', $device_label));

?>

<section class="sg-section">
<h2 class="section-header"><?= $device;?>
  <figure class="prototype-device <?= $device_class[0];?>-device">
    <video class="prototype-video" src="https://drive.google.com/uc?export=download&id=<?=get_sub_field('sg_prototype_url'); ?>" controls></video>
  </figure>
</section>

<?php endwhile; ?>
<?php endif; ?>
