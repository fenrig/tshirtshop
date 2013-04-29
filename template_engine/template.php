<?php
// http://www.codewalkers.com/c/a/Display-Tutorials/Writing-a-Template-System-in-PHP/2/

class template_engine{
	private $page_content;
	private $template;

	public function __construct($template_file = NULL){
		if($template_file <> NULL)
			$this->page($template_file);
	}

	public function page($template_file){
		$file = 'view/' . $template_file . '.html';
		if(file_exists($file)){
			$this->page_content = join("",file($file));
			$this->template = $template_file;
		}else
			die("[template - engine] template file $template_file not found.");
	}

	private function parse($PHP_file){
		ob_start();

		$local = 'view/' . $this->template . '/' . $PHP_file . '.php';
		if(file_exists($local)){
			include($local);
		}else{
			$global = 'view/global/' . $PHP_file . '.php';
			if(file_exists($global)){
				include($global);
			}else{
				ob_end_clean();
				return '<div>Template engine didn\'t find template file</div>';
			}
		}

		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}

	public function output(){
		$occurences = preg_match_all('#<template>(.*)</template>#i',$this->page_content, $array_occurences, PREG_PATTERN_ORDER);
		for($i = 0; $i < $occurences; $i++){
			$this->page_content = str_replace($array_occurences[0][$i], $this->parse($array_occurences[1][$i]), $this->page_content);
		}
		return $this->page_content;
	}
}

?>