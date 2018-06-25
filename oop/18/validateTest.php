<?php

require_once 'userstore.php';
require_once 'validate.php';
class ValidateTest extends PHPUnit_Framework_TestCase{
    private $validate;
    function setUp(){
        $store=new UserStore();
        $store->addUser('bob','a@b.com','123456');
        $this->validate=new Validate($store);
    }
    function tearDown(){

    }
    function testValidate_CorrectPass(){
        $this->assertTrue($this->validate->validateUser('a@b.com','123456'),'correct');
    }
}