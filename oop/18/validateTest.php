<?php

require_once 'userstore.php';
require_once 'validate.php';
class ValidateTest extends PHPUnit_Framework_TestCase{
    private $validate;
    function setUp(){
//        $store=new UserStore();
//        $store->addUser('bob','a@b.com','123456');
//        $this->validate=new Validate($store);
    }
    function tearDown(){

    }
    function testValidate_CorrectPass(){
//        $this->assertTrue($this->validate->validateUser('a@b.com','123456'),'correct');
    }
    function testValidate_FalsePass(){
        $store=$this->createMock('UserStore');
        $this->validate=new Validate($store);
        $store->expects($this->once())->method('notify')->with('a@b.com');
        $store->expects($this->any())->method('getUser')->will($this->returnValue(['name'=>'a@b.com','pass'=>'right']));
        $this->validate->validateUser('a@b.com','right');//期待一次，结果没有调用There was 1 failure:
//        1) ValidateTest::testValidate_FalsePass
//Expectation failed for method name is equal to <string:notify> when invoked 1 time(s).
//        Method was expected to be called 1 times, actually called 0 times.
//
//        FAILURES!
//        Tests: 2, Assertions: 1, Failures: 1.
        $this->validate->validateUser('a@b.com','wrong');//ok
    }
}