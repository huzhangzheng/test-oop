<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/5/7 12:51
 */
class Person{
    private $name;
    private $age;
    private $id;
    function __construct($name,$age,Account $account)
    {
        $this->name=$name;
        $this->age=$age;
        $this->account=$account;
    }
    function setId($id){
        $this->id=$id;
    }
    function __clone()
    {
        $this->id=0;
        $this->account=clone $this->account;
    }
    function __toString()
    {
        return 'aaaaa';
    }
}
class Account{
    public $balance;
    function __construct($balance)
    {
        $this->balance=$balance;
    }
}
$person=new Person('bob',44,new Account(200));
$person->setId(100);
$person2=clone $person;
$person->account->balance+=10;
print_r($person2);
print($person2);//toString