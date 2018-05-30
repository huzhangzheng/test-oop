<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/5/17 12:32
 */
namespace tasks;
//print_r(get_declared_classes());
class Task{
    function doSpeak(){
        echo 'hello<br>';
    }
    function doSpeak1(){
        echo 'hello1<br>';
    }
}

$obj=new Task();
$obj->doSpeak1();//正常

//print_r(get_declared_classes());
$classname="tasks\\Task";
$obj=new $classname();
$obj->doSpeak1();//正常

echo __NAMESPACE__.'<br>';
$classname=__NAMESPACE__."\\Task";
$obj=new $classname();
$obj->doSpeak();//正常

$classname="Task";
$obj=new $classname();
$obj->doSpeak();//报错 找不到



