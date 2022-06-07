<?php

class Tag
{
	private $name; 
	private $attrs = [];

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function setAttr($name, $value = true){
		$this->attrs[$name] = $value;
		return $this;
	}
	public function removeAttr($name){
		unset($this->attrs[$name]);
		return $this;
	}
	public function setAttrs($attrs){
		foreach ($attrs as $name => $value){
			$this->setAttr($name, $value);
		}
		return $this;
	}
	public function addClass($className){

		if (!isset($this->attrs['class'])){
			$this->attrs['class'] = $className;
		} else {

			$classNames = explode(' ', $this->attrs['class']);
			if (!in_array($className, $classNames)){
				$classNames[] = $className;
				$this->attrs['class'] = implode(' ', $classNames);
			}
		}
		return $this;
	}

	public function removeClass($className){
		if (isset($this->attrs['class'])){
			$classNames = explode(' ', $this->attrs['class']);
			if (in_array($className, $classNames)){
				$classNames = $this->removeElem($className, $classNames);
				$this->attrs['class'] = implode(' ', $classNames);
			}
		}
		return $this;
	}

	public function open(){
		$name = $this->name;
		$attrsStr = $this->getAttrsStr($this->attrs);
		return "<$name$attrsStr>";
	}

	public function close(){
		$name = $this->name;
		return "</$name>";
	}

	private function getAttrsStr($attrs){
		if (!empty($attrs)){
			$result = '';
			foreach ($attrs as $name => $value){
				if ($value === true){
					$result.=" $name=";
				} else {
					$result.=" $name=\"$value\"";
				}
			}
			return $result;
		}
		else {return '';}
	}

	private function removeElem($elem, $arr){
		$key = array_search($elem, $arr);
		array_splice($arr, $key, 1);
		return $arr;
	}
};

$tag = new Tag('img');
echo $tag->setAttrs(['src' => 'pic.jpg', 'title' => '707'])->open();

$tag1 = new Tag('header');
echo $tag1->open().'header сайта'.$tag1->close();

$tag2 = new Tag('input');
	
	echo $tag2
		->setAttr('id', 'test')
		->setAttr('disabled', true)
		->open(); // выведет <input id="test" disabled>

	
echo (new Tag('input'))->setAttr('name', 'name1')->open();
echo (new Tag('input'))->setAttr('name', 'name2')->open().'<br>';

//проверка addClass

		// Выведет <input class="eee">:
	echo (new Tag('input'))->addClass('eee')->open();
		// Выведет <input class="eee bbb">:
	echo (new Tag('input'))->addClass('eee')->addClass('bbb
		')->open();
		// Выведет <input class="eee bbb kkk">:
	echo (new Tag('input'))
		->setAttr('class', 'eee bbb')
		->addClass('kkk')->open();
		// Выведет <input class="eee bbb">:
	echo (new Tag('input'))
		->setAttr('class', 'eee bbb')
		->addClass('eee') // такой класс уже есть и не добавится
		->open();
		// Выведет <input class="eee bbb">:
	echo (new Tag('input'))
		->addClass('eee')
		->addClass('bbb')
		->addClass('eee') // такой класс уже есть и не добавится
		->open();
		
//проверка removeClass
echo (new Tag('input'))
		->setAttr('class', 'eee zzz kkk') // добавим 3 класса
		->removeClass('zzz') // удалим класс 'zzz'
		->open(); // выведет <input class="eee kkk">