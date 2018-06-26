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
        $this->store->addUser('bob','a@c.com','123456');
        $user=$this->store->getUser('a@c.com');
        $this->assertEquals($user['mail'],'a@c.com');
        $this->assertEquals($user['name'],'bob');
        $this->assertEquals($user['pass'],'123456');
    }
    function testMy(){

    }
    function testAddUser_duplicate(){
        try{
            $ret=$this->store->addUser('bob1','a@b.com','123456');
            $ret=$this->store->addUser('bob2','a@b.com','123456');
            self::fail('exception should have been thrown');

        }catch (Exception $e){
            $const=$this->logicalAnd(
                $this->logicalNot($this->contains('bob2')),
                $this->isType('array')
            );
            self::AssertThat($this->store->getUser('a@b.com'),$const);
        }
    }
}