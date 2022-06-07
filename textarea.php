<?php
require_once 'tag.php';
require_once 'form.php';
require_once 'submit.php';
require_once 'input.php';

class Textarea extends Tag{

	public function __construct(){
			parent::__construct('textarea');
		}

	public function show(){
		$message = $this->getAttr('name');
		if ($message){
			if (isset($_REQUEST[$message])){
				$value = $_REQUEST[$message];
				$this->setAttr('value', $value);
			}
		}
		return parent::show();
	}
}

?>