<?php
require_once 'date.php';
	class Interval
	{
		public $interval;
		public function __construct(Date $date1, Date $date2)
		{
			$this->interval = date('Y-m-d', strtotime($date2)-strtotime($date1));
		}
		
		public function toDays()
		{
			return  (int)strtotime($this->interval)/60/60/24;
		// вернет разницу в днях
		}
		
		public function toMonths()
		{
			return  (int)strtotime($this->interval)/60/60/24/30;// вернет разницу в месяцах
		}
		
		public function toYears()
		{
			return  (int)strtotime($this->interval)/60/60/24/30/12;// вернет разницу в годах
		}
		
		public function __toString()
		{
			// выведет результат в виде массива
			// ['years' => '', 'months' => '', 'days' => '']
		}
	}

	$date1 = new Date('2025-12-31');
	$date2 = new Date('2026-11-28');
	
	$interval = new Interval($date1, $date2);
	
	echo $interval->toDays().'<br>';   // выведет разницу в днях
	echo $interval->toMonths().'<br>'; // выведет разницу в месяцах
	echo $interval->toYears().'<br>';  // выведет разницу в годах
	
	var_dump($interval).'<br>'; // массив вида ['years' => '', 'months' => '', 'days' => '']
?>