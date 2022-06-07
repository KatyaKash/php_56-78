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

?>