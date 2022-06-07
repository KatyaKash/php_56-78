<?php
require_once 'tag.php';
require_once 'form.php';
require_once 'submit.php';
require_once 'input.php';
require_once 'hidden.php';

class Select extends Tag{
private $opts = [];
	public function __construct(){
			parent::__construct('select');
		}
	public function add(Option $opt){
		$this->opts[] = $opt; 
		return $this;
	}
	public function show()
	{
		$str = '';
		foreach ($this->opts as $opt) {
			$str .=  $opt->show();
		}
		return $this->open() . $str . $this->close();
	}
}
class Option extends Tag{

	public function __construct(){
			parent::__construct('option');
		}
			public function __toString(){
			return $this->show();
		}

}

$form = (new Form)->setAttrs(['action' => ' ', 'method' => 'GET']);
$sel = 	new Select;
echo $sel->setAttr('name', 'list')
	->add( (new Option())->setText('item1') )
	->add( (new Option())->setText('item2') )
	->add( (new Option())->setText('item3') )
	->show();
	echo $form->close();
?>