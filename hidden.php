<?php
require_once 'form.php';
require_once 'submit.php';
require_once 'input.php';

class Hidden extends Input{
	public function __construct()
		{
			$this->setAttr('type', 'hidden');
			parent::__construct();
		}
	}


	$form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);
	
 	echo $form->open();
		echo (new Hidden)->setAttr('name', 'id')->setAttr('value', '123');
		 echo (new Input)->setAttr('name', 'year');
		echo new Submit;
	echo $form->close();
?>