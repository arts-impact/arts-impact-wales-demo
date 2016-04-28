<?php
// Changes the markup structure created by the caption shortcode
// uses figure and figcaption to be more HTML5 groovy.

add_filter('img_caption_shortcode', 'proper_image_caption', 10, 3);

function proper_image_caption($val, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id'    => '',
        'align' => '',
        'width' => '',
        'caption' => ''
    ), $attr));

    if ( 1 > (int) $width || empty($caption) ) return $val;

    return '<figure id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . (0 + (int) $width) . 'px">' . do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $caption . '</figcation></figure>';
}


 ?>