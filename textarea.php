<?php
require_once 'tag.php';
require_once 'form.php';
require_once 'submit.php';
require_once 'input.php';

class Textarea extends Tag{
	public function __construct()
		{
			parent::__construct('textarea');
		}
	}


	$form = (new Form)->setAttrs(['action' => "test.txt", 'method' => 'GET']);
	
 	echo $form->open();
		echo (new Input)->setAttr('name', 'user');
		echo (new Textarea)->setAttr('name', 'message')->show();
		echo new Submit;
	echo $form->close();
?>