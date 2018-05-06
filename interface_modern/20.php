<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/5
 * Time: 17:37
 */
interface IConnect{
    const HOST='localhost';
    const UNAME='root';
    const PWD='123456';
    const DBNAME='test';
    static public function doConnect();
}
class UniversalConnect implements IConnect{
    private static $server=IConnect::HOST;
    private static $user=IConnect::UNAME;
    private static $pwd=IConnect::PWD;
    private static $db=IConnect::DBNAME;
    private static $hook;
    static public function doConnect()
    {
        self::$hook=mysqli_connect(self::$server,self::$user,self::$pwd,self::$db);
        if(self::$hook){
            echo 'mysql connect successful';
        }elseif(mysqli_connect_error(self::$hook)){
            echo 'connect failed:'.mysqli_connect_error();
        }
        return self::$hook;
    }
}
class Client{
    private $hook;
    public function __construct()
    {
        $this->hook=UniversalConnect::doConnect();
    }
}
$work=new Client();