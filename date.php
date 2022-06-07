<?php
class Date
{
	public $date;
	public $year;
	public $month;
	public $day;

	public function __construct($date = null){
		$this->date = $date;
		if ($date == null){
		$this->date = date('d-m-Y');}
//если дата не передана, берется текущая
		//, strtotime($date)
	}
	public function getDay(){
		return date('d', strtotime($this->date));
	}
	public function getMonth($lang = null){
		if ($lang == 'en'){
			$engMNames = [
        	1 => 'january', 'february', 'march', 'april', 'may',  'june', 'july', 'august', 'september', 'october',  'november', 'december',];
			return $engMNames[date('m', strtotime($this->date))];
		} elseif ($lang == 'ru')
		{
			$rusMNames = [
        	1 =>'Январь', 'Февраль', 'Март', 'Апрель', 'Май',  'Июнь', 
             'Июль', 'Август', 'Сентябрь', 'Октябрь',  'Ноябрь', 'Декабрь',];

			return $rusMNames[date('m', strtotime($this->date))];
		}
		else{return date('m', strtotime($this->date));}
	}
	public function getYear(){
		return date('Y', strtotime($this->date));

	}
	public function getWeekDay($lang = null)
	{
		if ($lang == 'en'){
			$engDaysNames = [
        	'sunday',
        	'monday',
        	'tuesday',
        	'wednesday',
        	'thursday',
        	'friday',
        	'saturday',];
			return $engDaysNames[date('N', strtotime($this->date))];
		} elseif ($lang == 'ru')
		{
			$rusDaysNames = [
        	'воскресенье',
        	'понеделник',
        	'вторник',
        	'среда',
        	'четверг',
       		'пятница',
        	'суббота',];

			return $rusDaysNames[date('N', strtotime($this->date))];
		}
		else{
		return date('N', strtotime($this->date));// возвращает день недели
		}	
		// переменная lang может принимать значение ru или en
		// если эта не пуста - пусть месяц будет словом на заданном языке
	}
		
	public function addDay($value)
	{
		$this->date = date('Y-m-d', strtotime($this->date."+ ${value} days"));
		return $this;// добавляет значение value к дню
	}
		
	public function subDay($value)
	{
		$this->date = date('Y-m-d', strtotime($this->date."- ${value} days"));
		return $this;// отнимает значение value от дня
	}
		
	public function addMonth($value)
	{
		$this->date =  date('Y-m-d', strtotime($this->date."+ ${value} months"));
		return $this;// добавляет значение $value к месяцу
	}
		
	public function subMonth($value)
	{
		$this->date =  date('Y-m-d', strtotime($this->date."- ${value} months"));
		return $this;// отнимает значение $value от месяца
	}
		
	public function addYear($value)
	{
		$this->date =  date('Y-m-d', strtotime($this->date."+ ${value} years"));
		return $this;// добавляет значение $value к году
	}
		
	public function subYear($value)
	{
		$this->date =  date('Y-m-d', strtotime($this->date."- ${value} years"));
		return $this;// отнимает значение $value от года
	}
		
	public function format($format)
	{
		$this->date =  date($format, strtotime($this->date));
		return $this->date;// выведет дату в указанном формате
		// формат пусть будет такой же, как в функции date
	}
	
	public function __toString()
	{
		return date('Y-m-d', strtotime($this->date));// выведет дату в формате 'год-месяц-день'
	}
}

	$date = new Date('2025-12-31');
	
	echo $date->getYear().'<br>';  // выведет '2025'
	echo $date->getMonth().'<br>'; // выведет '12'
	echo $date->getMonth('en').'<br>'; // выведет 'december'
	echo $date->getMonth('ru').'<br>'; // выведет 'Декабрь'
	echo $date->getDay().'<br>';   // выведет '31'
	
	echo $date->getWeekDay().'<br>';     // выведет '3'
	echo $date->getWeekDay('ru').'<br>'; // выведет 'среда'
	echo $date->getWeekDay('en').'<br>'; // выведет 'wednesday'

	echo (new Date('2025-12-31'))->addYear(1).'<br>'; // '2026-12-31'
	echo (new Date('2025-12-31'))->addDay(1).'<br>';  // '2026-01-01'
	
	echo (new Date('2025-12-31'))->subDay(3)->addYear(1); //'2026-12-28'
?>


