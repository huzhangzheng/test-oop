<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/4/26
 * Time: 12:43
 */
abstract class DomainObject{
    private $group;
    public function __construct()
    {
        $this->group=static::getGroup();
    }
    public static function create(){

        $a=new static();
        print_r($a);
        return $a;
    }
    static function getGroup(){
        return 'default';
    }
}
class User extends DomainObject{};
class Document extends DomainObject{
    static function getGroup(){
        return 'document';
    }
}
class SpreadSheet extends Document{

};
//User::create();
SpreadSheet::create();