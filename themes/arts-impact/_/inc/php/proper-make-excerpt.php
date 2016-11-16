<?php

// Cleans up and shortens text
// for creating excerpt when custom excerpts aren't available
// Wrapper around wp_trim_words with added shortcode removal

function proper_make_excerpt($content, $count = 50, $more = '&hellip;'){

  // remove shortcodes first so we don't include them in our count
  $content = strip_shortcodes( $content );

  // trim to taste
  $content = wp_trim_words( $content, $count, $more );

  return $content;
}

 ?>