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
?>