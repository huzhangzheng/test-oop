<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/5/28 12:33
 */
namespace com\getinstance\util;
class Debug{
    static function hello(){
        print 'hello from com<br>';
    }
}

Debug::hello();
\com\getinstance\util\Debug::hello();

namespace cc\util;
class Debug{
    static function hello(){
        print 'hello from cc<br>';
    }
}



namespace main;
//\com\getinstance\util\Debug::hello();
//com\getinstance\util\Debug::hello();//找不到

use com\getinstance\util;//隐式别名util
util\Debug::hello();
//Debug::hello();//Fatal error: Class 'main\Debug' not found in

//use cc\util;//Cannot use cc\util as util because the name is already别名一致
//Debug::hello();

use com\getinstance\util\Debug as uDebug;
uDebug::hello();
util\Debug::hello();//30行
//\main\Debug::hello();//不存在

use com\getinstance\util\Debug;
Debug::hello();

//class Debug{//Cannot declare class main\Debug because the name is already in use  主要和37行冲突
//    static function hello(){
//        print 'hello from main<br>';
//    }
//}
//Debug::hello();
//\main\Debug::hello();//不存在