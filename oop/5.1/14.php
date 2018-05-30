<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/5/17 12:33
 */
require_once '13.php';
$classname='Task';
$classname="tasks\\$classname";
$obj=new $classname();
$obj->doSpeak();