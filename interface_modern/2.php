<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/4/14
 * Time: 21:01
 */
interface IConnectInfo{
    const HOST='localhost';
    const UNAME='root';
    const DBNAME='test';
    const PWD='123456';
    public function aa();
}
class ConSql implements IConnectInfo{
    private $server = IConnectInfo::HOST;
    private $db=IConnectInfo::DBNAME;
    private $uname=IConnectInfo::UNAME;
    private $pwd=IConnectInfo::PWD;
    public function testConnect(){
        $hookup=new mysqli($this->server,$this->uname,$this->pwd,$this->db);
        if(mysqli_connect_error()){
            die('error');
        }
        print $hookup->host_info;
        $hookup->close();
    }
    public function aa(){

    }
}
$userConnect=new ConSql();
$userConnect->testConnect();
?>