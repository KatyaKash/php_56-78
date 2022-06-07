<?php
require_once 'tag.php';

	class Form extends Tag
	{
		public function __construct(){
			parent::__construct('form');

		}
	}

	class Input extends Tag
	{
		public function __construct(){
			parent::__construct('input');

		}
	}

	$form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);
	
 	echo $form->open();
		echo (new Input)->setAttr('name', 'year')->open();
		echo (new Input)->setAttr('type', 'submit')->open();
	echo $form->close();
?>