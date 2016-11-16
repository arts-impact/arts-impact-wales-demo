<?php

// Reverse oEmbed
// Take an iframe and spit out the URL

function reverse_oembed($iframe){

  // use preg_match to find iframe src
  preg_match('/src="(.+?)"/', $iframe, $matches);
  $src = $matches[1];

  $video_service = str_ireplace('www.', '', parse_url($src, PHP_URL_HOST));

  if(substr($video_service, 0, 5) == 'youtu' ) {

    // Trim away some of ACF's oembed code
    $src = rtrim($src, '?feature=oembedvideo');
    $src = str_replace('youtube.com/embed/', 'youtube.com/watch?v=', $src);

  }

  // get the normal vimeo URL structure rather than the embed URL
  $src = str_replace('player.vimeo.com/video', 'vimeo.com', $src);

  return $src;

}

// Get the YouTube ID from the url
function youtube_id_from_url($url) {
    $pattern =
        '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x'
        ;
    $result = preg_match($pattern, $url, $matches);
    if (false !== $result) {
        return $matches[1];
    }
    return false;
}

?>