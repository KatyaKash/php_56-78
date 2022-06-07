<?php
require_once 'form.php';
require_once 'input.php';

class Submit extends Input{
	public function __construct()
		{
			$this->setAttr('type', 'submit');
			parent::__construct();
		}
	}
	$form = (new Form)->setAttrs(['action' => 'test.txt', 'method' => 'GET']);
	
 	echo $form->open();
		echo (new Input)->setAttr('name', 'year');
		echo new Submit;
	echo $form->close();