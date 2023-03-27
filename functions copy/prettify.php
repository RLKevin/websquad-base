<?php 

function str_replace_first($from, $to, $content){
	$from = '/'.preg_quote($from, '/').'/';
	return preg_replace($from, $to, $content, 1);
}

function to_strong($string) {
	$Open_OR_Closed_Tag = false;  // this for to know what tag should put
	while (substr_count($string, '*') > 1 || $Open_OR_Closed_Tag) {
		if ($Open_OR_Closed_Tag) {
			$string = str_replace_first("*", "</strong>", $string);
			$Open_OR_Closed_Tag = false;
		} else {
			$string = str_replace_first("*", "<strong>", $string);
			$Open_OR_Closed_Tag = true;
		}
	}
	return $string;
}

function to_emphasized($string) {
	$Open_OR_Closed_Tag = false;  // this for to know what tag should put
	while (substr_count($string, '_') > 1 || $Open_OR_Closed_Tag) {
		if ($Open_OR_Closed_Tag) {
			$string = str_replace_first("_", "</em>", $string);
			$Open_OR_Closed_Tag = false;
		} else {
			$string = str_replace_first("_", "<em>", $string);
			$Open_OR_Closed_Tag = true;
		}
	}
	return $string;
}

function to_break($string) {
	$string = preg_replace('/\\\/', '<br/>', $string);
	return $string;
}

function to_prettify($string) {
	
	$string = to_strong($string);
	$string = to_emphasized($string);
	$string = to_break($string);

	return $string;
}

?>