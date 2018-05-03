<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/4/15
 * Time: 18:05
 */
interface IFace{
    //@return字符串
    function stringMethod();
    //@return整数
    function numMethod();
    //不使用return
    function noReturnMethod();
}
class MyFace implements IFace{
    function __construct()
    {
        echo $this->stringMethod();
        echo $this->numMethod();
        echo $this->noReturnMethod();
    }

    function stringMethod()
    {
        // TODO: Implement stringMethod() method.
//        return 1;
    }
    function numMethod()
    {
        // TODO: Implement numMethod() method.
    }
    function noReturnMethod()
    {
        return 33;
        // TODO: Implement noReturnMethod() method.
    }
}
$work=new MyFace();
?>