<?php 

// http://fotorama.io

function proper_fotorama() {

  if(function_exists('get_field')){

    $field = get_field('media');

    // Prepare an array to populate before encoding as a JSON object for FOTORAMA
    $fotorama_ready = array();
    $i = 0;

    while(have_rows('media')): the_row();

      if(get_sub_field('video')):
          // Get the iframe -- contains iframe markup
          $iframe = get_sub_field('video');
          $src = reverse_oembed($iframe);


          $fotorama_ready[$i] = array(
            'video' => $src
          );

        else:

          $image = get_sub_field('image');

          $fotorama_ready[$i] = array(
            'img'       => $image['sizes']['large'],
            'thumb'       => $image['sizes']['thumbnail'],
            'caption'     => $image['caption']
          );

      endif;

      $i++;

    endwhile;

    if(!empty($fotorama_ready)){

      echo  '<div class="fotorama-wrapper">' .
              '<div class="fotorama"></div>' .

              '<script>
                var data = '. json_encode( $fotorama_ready ) . ';
                $(".fotorama").fotorama({ 
                  "data": data,
                  "nav": "thumbs",
                  "width": "100%",
                  "ratio": "700/467",
                  "max-width": "100%"
                });
              </script>' .
            '</div>';
    }
  }else{
    return null;
  }
}