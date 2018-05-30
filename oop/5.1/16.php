<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/5/28 19:21
 */
class Product{

    public $name;
    public $price;
    function __construct($name,$price,$cc='')
    {
        $this->name=$name;
        $this->price=$price;
    }
}
$pro=new ReflectionClass('Product');
Reflection::export($pro);

$pro=new Product('sb',20);
var_dump($pro);
print_r($pro);

function classData(ReflectionClass $class){
    $details='';
    $name=$class->getName();
    if($class->isUserDefined()){
        $details.="$name is user defined\n";
    }
    return $details;
}
$pro=new ReflectionClass('Product');
print classData($pro);

class ReflectUtil{
    static function getClassSource(ReflectionClass $class){
        $path=$class->getFileName();
        echo $path;
        $lines=@file($path);
        print_r($lines);
        $from=$class->getStartLine();
        echo $from;
        $to=$class->getEndLine();
        echo $to;
        $len=$to-$from+1;
        return implode(array_slice($lines,$from-1,$len));
    }
}
print ReflectUtil::getClassSource(new ReflectionClass('Product'));