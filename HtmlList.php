<?php
require_once 'tag.php';

	class ListItem extends Tag
	{
		public function __construct(){
			parent::__construct('li');
		}
	}

	
	class HtmlList extends Tag
	{
		private $items = [];

		public function addItem(ListItem $li){
			$this->items[] = $li;
			return $this; 
		}
		public function show(){
			$res = $this->open();
			foreach ($this->items as $item) {
				$res .= $item->show();
			}
			$res .= $this->close();
			
			return $res;
		}
		public function __toString(){
			return $this->show();
		}
	}

	class OL extends HtmlList{
		public function __construct(){
			parent::__construct('ol');
		}
	}
	class UL extends HtmlList{
		public function __construct(){
			parent::__construct('ul');
		}
	}

	$list = new HtmlList('ul');
	
	echo $list
		->addItem( (new ListItem())->setText('item1') )
		->addItem( (new ListItem())->setText('item2') )
		->addItem( (new ListItem())->setText('item3') );
	
	$ul = new Ul;
	echo $ul
		->addItem( (new ListItem())->setText('item1') )
		->addItem( (new ListItem())->setText('item2') )
		->addItem( (new ListItem())->setText('item3') );
	$ol = new Ol;
	echo $ol
		->addItem( (new ListItem())->setText('item1') )
		->addItem( (new ListItem())->setText('item2') )
		->addItem( (new ListItem())->setText('item3') );
?>