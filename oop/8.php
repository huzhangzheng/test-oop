<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/5/7 12:51
 */
class Person{
    private $name;
    private $age;
    private $id;
    function __construct($name,$age)
    {
        $this->name=$name;
        $this->age=$age;
    }
    function setId($id){
        $this->id=$id;
    }
    function __destruct()
    {
        if(!empty($this->id)){
            echo 'i am done';
        }

    }
}
$person=new Person('bob',44);
$person->setId(100);
sleep(10);
//unset($person);