<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/4/22
 * Time: 18:22
 */
abstract class CloneMe{
    public $name;
//    abstract function __clone();
}
class Person extends CloneMe{
    public function __construct()
    {
        $this->name='original';
    }
    public function display(){
        echo $this->name;
    }
    function __clone()
    {
        // TODO: Implement __clone() method.
//        $this->name='cloned1';
    }
}
$work=new Person();

$work->name='orginal2';
$work->display();
echo '<br>';
$slack=clone $work;
//$slack->name='cloned2';
$slack->display();

echo '<hr><br>';

class HelloClone{
    public function __construct()
    {
        echo 'hello,clone<br>';
        $this->param='cc';
    }
    public function doWork(){
        return $this->param;
//        echo 'do work';
    }
}
$work1=new HelloClone();
echo $work1->doWork();
echo '<br><hr>';
$slack1=clone $work1;
echo $slack1->doWork();