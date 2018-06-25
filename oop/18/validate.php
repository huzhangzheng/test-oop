<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/6/25 13:03
 */
class Validate{
    private $store;
    public function __construct(UserStore $store)
    {
        $this->store=$store;
    }
    public function validateUser($mail,$pass){
        if(!is_array($user=$this->store->getUser($mail))){
            return false;
        }
        if($user['pass']==$pass){
            return true;
        }
        $this->store->notify($mail);
        return false;
    }
}
