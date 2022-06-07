<?php
require_once 'form.php';
require_once 'submit.php';
require_once 'input.php';

class Password extends Input{
	public function __construct()
		{
			$this->setAttr('type', 'password');
			parent::__construct();
		}
	}


	$form = (new Form)->setAttrs(['action' => 'test.txt', 'method' => 'GET']);
	
 	echo $form->open();
		echo (new Input)   ->setAttr('name', 'login');
		echo (new Password)->setAttr('name', 'passw');
		echo new Submit;
	echo $form->close();
?>