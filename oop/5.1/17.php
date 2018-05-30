<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/5/29 12:41
 */
class Product{

    public $name;
    public $price;
    function __construct(Exception $name,$price,$cc='')
    {
        $this->name=$name;
        $this->price=$price;
    }
    function test($aa){
        echo $aa;
    }
}
//检查方法
$proclass=new ReflectionClass('Product');
$methods=$proclass->getMethods();

foreach ($methods as $method){
    print methodData($method);
}
function methodData(ReflectionMethod $method){
    $details='';
    $name=$method->getName();
    if($method->isUserDefined()){
        $details.="$name is userdefined\n";
    }
    if($method->isConstructor()){
        $details.="$name is the constructor\n";
    }
    return $details;
}
//打印类的方法
class ReflectUtil{
    static function getMethodSource(ReflectionMethod $class){
        $path=$class->getFileName();
        $lines=@file($path);
        $from=$class->getStartLine();
        $to=$class->getEndLine();
        $len=$to-$from+1;
        return implode(array_slice($lines,$from-1,$len));
    }
}
$proclass=new ReflectionClass('Product');
$method=$proclass->getMethod('test');

print ReflectUtil::getMethodSource($method);


//检查方法参数
$proclass=new ReflectionClass('Product');
$method=$proclass->getMethod('__construct');
$params=$method->getParameters();
foreach ($params as $param){
    print argData($param);
}

function argData(ReflectionParameter $param){
    $details='';
    $name=$param->getName();
    $class=$param->getClass();
    $pos=$param->getPosition();
    $details.=$name.$class.$pos;
    return $details;
}