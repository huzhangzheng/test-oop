<?php

require_once 'userstore.php';
class UserStoreTest extends PHPUnit_Framework_TestCase{
    private $store;
    function setUp(){
        $this->store=new UserStore();
    }
    function tearDown(){

    }
    function testGetUser(){
        $this->store->addUser('bob','a@c.com','1234');
        $user=$this->store->getUser('a@c.com');
        $this->assertEquals($user['mail'],'a@c.com');
        $this->assertEquals($user['name'],'bob');
        $this->assertEquals($user['pass'],'123');
    }
    function testMy(){

    }
}