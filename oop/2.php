<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/4/25
 * Time: 12:56
 */
interface IProduct{
//    public $a;
    const SB=1;
    public function test();
}
class Abc implements IProduct{
    public function __construct()
    {
        $this->test();
    }

    public function test()
    {
        echo Abc::SB;
        // TODO: Implement test() method.
    }
}
new Abc();


echo '<hr>';

abstract class DomainObject{
    public static function create(){
        return new static();
    }
}
class User extends DomainObject{}
class Document extends DomainObject{}
print_r(Document::create());
