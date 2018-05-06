<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/4/27 11:32
 */
 class Check{
    protected final function test(){
        echo 'check';
    }
    final static function bb(){
        echo 'bb';
    }
     function aa(){
        self::test();
     }
}
class Child extends Check{
    function __construct()
    {
        $this->test();
        self::aa();
        static::aa();
        echo '22';
    }
    function aa(){
        echo 'child aa';
    }

}
$work=new Child();
