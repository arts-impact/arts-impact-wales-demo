<?php 

// takes a single param $name and returns a use element
// usage <svg viewBox="0 0 100 100"> proper_icon($name); </svg>

function proper_icon($name){

  if(isset($name)){

    $svg_root = get_stylesheet_directory_uri() . '/_/svg/symbols.svg';
    $svg_relative_root = wp_make_link_relative($svg_root);
    $use_format = '<use xlink:href="%1$s#%2$s"/>';

    return sprintf($use_format, $svg_relative_root, $name);

  }else{
    return null;
  }
}

function get_proper_icon($name){
	return proper_icon($name);
}

function the_proper_icon($name){
	echo proper_icon($name);
}

function get_proper_svg($name, $classname = null, $id = null, $viewbox = null){
	return sprintf(
		'<svg class="%s" id="%s" %s>%s</svg>',
		$classname,
		$id,
		$viewbox ? "viewBox=\"$viewbox\"" : "",
		get_proper_icon($name)
		);
}

function the_proper_svg($name, $classname = null, $id = null, $viewbox = null){
	printf(get_proper_svg($name, $classname, $id, $viewbox));
}

 ?>