<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/6/25 13:03
 */
class UserStore{
    private $users=array();

    function addUser($name,$mail,$pass){
        if(isset($this->users[$mail])){
            throw new Exception('user'.$mail.' already in the system');
        }
        if(strlen($pass) <5){
            throw new Exception('pass short');
        }
        $this->users[$mail]=array('pass'=>$pass,'mail'=>$mail,'name'=>$name);
    }
    function notify($mail){
        if(isset($this->users[$mail])){
            $this->users[$mail]['failed']=time();
        }
    }
    function getUser($mail){
        return $this->users[$mail];
    }
}
