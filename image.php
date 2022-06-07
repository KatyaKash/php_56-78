<?php
require_once 'tag.php';
	class Image extends Tag
	{
		public function __construct(){
			parent::__construct('img');
			$this->setAttr('src', '')->setAttr('alt', '');
		}
		public function __toString(){
			return parent::open();
		}

	}

echo (new Image())->setAttr('src', 'pic.jpg')->setAttrs(['width' => '300', 'height' => '200']);


?>