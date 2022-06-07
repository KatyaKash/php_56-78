<?php
require_once 'link.php';

echo (new Link())->setAttr('href', '1.php')->setText('1')->show().'<br>';
echo (new Link())->setAttr('href', '2.php')->setText('2')->show().'<br>';
echo (new Link())->setAttr('href', '3.php')->setText('3')->show().'<br>';
echo (new Link())->setAttr('href', '4.php')->setText('4')->show().'<br>';
echo (new Link())->setAttr('href', '5.php')->setText('5')->show().'<br>';
