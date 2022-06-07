<?php
require_once 'tag.php';
require_once 'form.php';
//$sum = 0;
	class Input extends Tag
	{

		public function __construct(){
			parent::__construct('input');
		}
		public function open(){

			$inputName = $this->getAttr('name');
			if ($inputName){
				if (isset($_REQUEST[$inputName])){
					$value = $_REQUEST[$inputName];
					//global $sum;
					//$sum = $sum + $value;
					$this->setAttr('value', $value);
				}
			}
			return parent::open();

		}
		public function __toString(){
			return $this->open();
		}
	}
/*$form = (new Form)->setAttrs(['action' => '', 
		'method' => 'GET']);
	
 	echo $form->open();
		echo (new Input)->setAttr('name', 'a');
		echo (new Input)->setAttr('name', 'b');
		echo (new Input)->setAttr('name', 'c');
		echo (new Input)->setAttr('name', 'd');
		echo (new Input)->setAttr('name', 'e');
		echo (new Input)->setAttr('type', 'submit');
	echo $form->close();
echo $sum;*/