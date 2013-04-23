<?php

function getimage($folder,$basename){
	$file_extensions = array(
	"jpeg","jpg","png","svg");

	foreach($file_extensions as $file_extension){
		if(file_exists('resources/' . $folder . '/' . $basename . '.' . $file_extension)){
			header('Content-Type: image/'.$file_extension);
			header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 216000));
			readfile('resources/' . $folder . '/' . $basename . '.' . $file_extension);
			return;
		}
	}
	return;
}

function thumbnail($cid){
	getimage("thumbnails",$cid);
}

function fullnail($cid){
	getimage("fullnails",$cid);
}

function getcss($name){
	if(file_exists('resources/css/' . $name)){
		//header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 216000));
		echo file_get_contents('resources/css/' . $name);
	}
}

function getmisc($name){
	if(file_exists('resources/misc/' . $name)){
		$list = explode(".",$name);
		$file_extension = $list[1];
		header('Content-Type: image/'.$file_extension);
		header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 216000));
		echo file_get_contents('resources/misc/' . $name);
	}
}
?>