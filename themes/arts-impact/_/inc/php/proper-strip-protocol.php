<?php

//////////////////////////////////////////
// remove the protocol from a given url //
//////////////////////////////////////////

function proper_strip_protocol($url){

	$stripped_url = preg_replace('#^https?://#', '', $url);
	return $stripped_url;

}


?>