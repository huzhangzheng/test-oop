<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/6
 * Time: 23:33
 */
class Person{
    public $_age=18;
    function __get($property)
    {
        $method="get{$property}";
        if(method_exists($this,$method)){
            return $this->$method();
        }
    }
    function getName(){
        return 'bob';
    }
    function __isset($property)
    {
        $method="get{$property}";
        return method_exists($this,$method);
    }
    function __set($name, $value)
    {
        $method="set{$name}";
        if(method_exists($this,$method)){
            return $this->$method($value);
        }
    }
    function setAge($age){
        $this->_age=$age;
    }
    function __unset($name)
    {
        $method="set{$name}";
        if(method_exists($this,$method)){
            $this->$method(null);
        }
    }
}
$p=new Person();
//__get()
//echo $p->name;
//__isset()
//if(isset($p->name)){
//    echo $p->name;
//}
//__set()
//$p->age='12';
//echo $p->_age;
//__unset()
//echo $p->_age;
//unset($p->age);
//echo $p->_age;

class PersonNew{
    private $writer;
    function __construct(PersonWriter $writer)
    {
        $this->writer=$writer;
    }
    function __call($method, $arguments)
    {
        if(method_exists($this->writer,$method)){
            return $this->writer->$method($this);
        }
    }
    function getName(){
        return 'nick';
    }
//    function writeName(){
//        $this->writer->writeName($this);
//    }
}
class PersonWriter{
    function writeName(PersonNew $personNew){
        echo $personNew->getName();
    }
}

$personnew=new PersonNew(new PersonWriter());
$personnew->writeName();