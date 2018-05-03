<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/4/23
 * Time: 12:26
 */
class StaticExample{
    static public $num=7;
    public $num_pub;
    public function sayHello(){
//        return  'hello';
        $this->num_pub=4;
    }
    public function __construct()
    {
        StaticExample::$num=1;
        echo StaticExample::$num;
    }
    static public function setNum(){
        StaticExample::$num=2;
    }
    public function setNumPublic(){
        StaticExample::$num=3;
        echo StaticExample::$num;
    }
}

//echo StaticExample::sayHello();
echo StaticExample::setNum();
echo StaticExample::$num;
StaticExample::$num=5;
echo StaticExample::$num;
$work=new StaticExample();
echo $work->setNumPublic();
echo $work->num_pub;
echo $work->sayHello();
echo StaticExample::$num;
StaticExample::$num=6;
echo StaticExample::$num;
//echo $work->num;
