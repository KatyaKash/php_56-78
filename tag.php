<?php

class Tag
{
	private $name; 
	private $attrs;

	public function __construct($name, $attrs = [])
	{
		$this->name = $name;
		$this->attrs = $attrs;
	}

	public function open(){
		$name = $this->name;
		$attrsStr = $this->getAttrsStr($this->attrs);
		return "<$name$attrsStr>";
	}
	public function close(){
		$name = $this->name;
		return "</$name>";
	}
	private function getAttrsStr($attrs){
		if (!empty($attrs)){
			$result = '';
			foreach ($attrs as $name => $value){
				$result.=" $name=\"$value\"";
			}
			return $result;
		}
		else {return '';}
	}
}

$tag = new Tag('img', ['src' => 'pic.jpg', 'title' => '707']);
echo $tag->open();

$tag1 = new Tag('header');
echo $tag1->open().'header сайта'.$tag1->close();

