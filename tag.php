<?php

class Tag
{
	private $name; 
	private $attrs = [];

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function setAttr($name, $value){
		$this->attrs[$name] = $value;
		return $this;
	}
	public function removeAttr($name){
		unset($this->attrs[$name]);
		return $this;
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

$tag = new Tag('img');
echo $tag->setAttr('src', 'pic.jpg')->open();

$tag1 = new Tag('header');
echo $tag1->open().'header сайта'.$tag1->close();
