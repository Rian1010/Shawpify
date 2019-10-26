<?php

$contentExample = array(
	array(
		//key=>value, key2=>value2
		"name" => "First Product",
		"price" => "€24.99",
		"description" => "This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit"
	),
	array(
		"name" => "Second Product",
		"price" => "€14.99",
		"description" => "This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit"
	),
	array(
		"name" => "Third Product",
		"price" => "€34.99",
		"description" => "This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit"
	),
	array(
		//key=>value, key2=>value2
		"name" => "Fourth Product",
		"price" => "€44.99",
		"description" => "This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit"
	),
	array(
		"name" => "Fifth Product",
		"price" => "€54.99",
		"description" => "This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit"
	),
	array(
		"name" => "Sixth Product",
		"price" => "€77.99",
		"description" => "This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit"
	)
);

//$test[3]["name"]


class Template {
	private $template;
	private $content;
	private $hasNext;
	private $noOfResults;

	public function __construct($theTemplate,$theContent) {
		//Should validate arguments before we continue
		$this->load($theTemplate, $theContent);
	}

	public function __get($aVal) {
		if($aVal=="hasNext") {
			return $this->$aVal;
		}
		else if($aVal=="noOfResults") {
			return $this->$aVal;
		}
		else {
			die("Cannot access private property Template::$aVal");
		}
	}

	public function output() {
		$record = current($this->content);
		$html = $this->template;
		foreach ($record as $key => $val) {
			//test case: $key = "name", $val = "First Product"
		//	new html value  	replace this, with this, string to search(old html value)
			$html = str_replace("{".$key."}", $val, $html);
		}
		if(!next($this->content)) {
			$this->hasNext = FALSE;
		}

		return $html;
	}

	public function load($theTemplate, $theContent) {
		$this->template = file_get_contents("http://localhost/quick/shawpify/templates/$theTemplate", true);
		//$this->template= $theTemplate;
		$this->content = $theContent;
		$this->hasNext = TRUE;
		$this->noOfResults = sizeof($this->content);
	}
}
/*
$test = new Template("product_thumbnail.html", $contentExample);

while($test->hasNext) {
	echo $test->output();
}
*/