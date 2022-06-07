<?php

class File implements iFile{
	public $filePath;
	public $text;

		public function __construct($filePath){
			$this->filePath = $filePath;

}
		public function getPath(){
			return $this->filePath;
		} // путь к файлу
		public function getDir(){
			$path_parts = pathinfo($this->filePath);
			return $path_parts['dirname'];
		}  // папка файла
		public function getName(){
			$path_parts = pathinfo($this->filePath);
			return $path_parts['filename'];
		} // имя файла
		public function getExt(){
			$path_parts = pathinfo($this->filePath);
			return $path_parts['extension'];
		}  // расширение файла
		public function getSize(){
			return filesize($this->filePath);
		} // размер файла
		
		public function getText(){
			return file_get_contents($this->filePath);
		}          // получает текст файла
		public function setText($text){
			file_put_contents($this->filePath, $text);
		}     // устанавливает текст файла
		 public function appendText($text){
			file_put_contents($this->filePath, '!', FILE_APPEND);
		 }  // добавляет текст в конец файла
		
		public function copy($copyPath){
			copy($this->filePath, $copyPath);
		}   // копирует файл
		public function delete(){
			unlink($this->filePath);
		}           // удаляет файл
		public function rename($newName){
			rename(pathinfo($this->filePath)['filename'].'.'.pathinfo($this->filePath)['extension'], $newName);
		}   // переименовывает файл
		public function replace($newPath){
			rename($this->filePath, $newPath);
		}  // перемещает файл

}

	interface iFile
	{
		public function __construct($filePath);
		
		public function getPath(); // путь к файлу
		public function getDir();  // папка файла
		public function getName(); // имя файла
		public function getExt();  // расширение файла
		public function getSize(); // размер файла
		
		public function getText();          // получает текст файла
		public function setText($text);     // устанавливает текст файла
		 public function appendText($text);  // добавляет текст в конец файла
		
		public function copy($copyPath);    // копирует файл
		public function delete();           // удаляет файл
		public function rename($newName);   // переименовывает файл
		public function replace($newPath);  // перемещает файл
	}

$myF = new File('php_56-78\test.txt');
echo $myF->getPath().'<br>';
echo $myF->getExt().'<br>';
echo $myF->getSize().'<br>';
echo $myF->getText().'<br>';
echo $myF->appendText('yjjyjjyjjyjyjyjyj').'<br>';
echo $myF->rename('newName.txt').'<br>';
?>