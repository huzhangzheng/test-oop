<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/5/14 18:57
 */
namespace my;
class Product{
    static function hello(){
        echo 'hello from my '.__NAMESPACE__;
    }
}
namespace user;
class Product{
    static function hello(){
        echo 'hello from user '.__NAMESPACE__;
    }
};
\my\Product::hello();
echo '<hr>';
Product::hello();
echo '<hr>';
#\Product::hello();//全局没有
#my\Product::hello();//当前相对路径下没有

//use my;
//my\Product::hello();
//echo '<hr>';
use my\Product as cc;
cc::hello();


