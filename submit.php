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