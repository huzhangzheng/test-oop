<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/5/10 12:14
 */
class Product{
    public $name;
    public $price;
    function __construct($name,$price)
    {
        $this->name=$name;
        $this->price=$price;
    }
}
class ProcessSale{
    private $callbacks;
    function registerCallback($callback){
        if(!is_callable($callback)){
            throw new Exception('callback not callable');
        }
        $this->callbacks[]=$callback;
    }
    function sale($product){
        print $product->name.":processing \n";
        foreach ($this->callbacks as $callback){
            call_user_func($callback,$product);
        }
    }
}
//回调匿名函数（老式创建）
$logger=create_function('$product','print "logging({$product->name})\n";');//php自带的创建匿名函数,变量不解析
$processor=new ProcessSale();
$processor->registerCallback($logger);

$processor->sale(new Product('shoes',6));
echo '<br>';
$processor->sale(new Product('coffee',7));
echo '<hr>';


//回调匿名函数（php5.3以后新的）
$logger2=function ($product){
    print "logging ({$product->name})\n";
};
$processor=new ProcessSale();
$processor->registerCallback($logger2);

$processor->sale(new Product('shoes',6));
echo '<br>';
$processor->sale(new Product('coffee',7));
echo '<hr>';


//回调对象方法
class Mailer{
    function doMail($product){
        print "mailing ({$product->name})\n";
    }
}
$processor=new ProcessSale();
$processor->registerCallback(array(new Mailer(),'doMail'));

$processor->sale(new Product('shoes',6));
echo '<br>';
$processor->sale(new Product('coffee',7));
echo '<hr>';

//回调 对象方法返回的匿名函数
class Total{
    static function warn(){
        return function ($product){
            print "total ({$product->name})\n";
        };
    }
    function warn2(){
        return function ($product){
            print "total2 ({$product->name})\n";
        };
    }
}
$processor=new ProcessSale();
$processor->registerCallback(Total::warn());//这种可以

$processor->sale(new Product('shoes',6));
echo '<br>';
$processor->sale(new Product('coffee',7));
echo '<hr>';
$processor=new ProcessSale();
$processor->registerCallback(array(new Total(),'warn2'));//这种不行
$processor->sale(new Product('shoes',6));
echo '<br>';
$processor->sale(new Product('coffee',7));
echo '<hr>';

//利用use，让匿名函数追踪来自父作用域的变量
class Totalizer{
    static function warn($amt){
        $count=0;
        return function ($product) use($amt,&$count){
            $count+=$product->price;
            print "count :$count\n";
            if($count > $amt){
                print "high price reached: $count\n";
            }
        };
    }
}
$processor=new ProcessSale();
$processor->registerCallback(Totalizer::warn(8));
$processor->sale(new Product('shoes',6));
echo '<br>';
$processor->sale(new Product('coffee',7));

