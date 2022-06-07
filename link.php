<?php
require_once 'tag.php';
	class Link extends Tag
	{
		public function __construct(){
			parent::__construct('a');
			$this->setAttr('href', '');
		}
		private function activateSelf(){
			if ($this->getAttr('href') == $_SERVER['REQUEST_URI']){
				$this->addClass('active');
			}
		}
		public function open(){
			$this->activateSelf();
			return parent::open();
		}
	}

?>