<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/4/24
 * Time: 23:20
 */
abstract class IAcmePrototype{
    protected $name;
    protected $dept;
    abstract function setDept($orhCode);
    abstract function getDept();

    public function setName($name){
        $this->name=$name;
    }
    public function getName(){
        return $this->name;
    }
}
class Marketing extends IAcmePrototype{
    const UNIT='marting';
    private $sales='sales';
    private $promotion='promotion';
    private $strategic='strategic';
    public function setDept($orgCode)
    {
        // TODO: Implement setDept() method.
        switch($orgCode){
            case 101:
                $this->dept=$this->sales;
                break;
            case 102:
                $this->dept=$this->promotion;
                break;
            case 103:
                $this->dept=$this->strategic;
                break;
            default:
                $this->dept='Unrecognized Marketing';
        }
    }
    public function getDept()
    {
        // TODO: Implement getDept() method.
        return $this->dept;
    }
}
class Management extends IAcmePrototype{
    const UNIT='management';
    private $research='research';
    private $plan='plan';
    private $operation='operation';
    public function setDept($orgCode)
    {
        // TODO: Implement setDept() method.
        switch($orgCode){
            case 201:
                $this->dept=$this->research;
                break;
            case 202:
                $this->dept=$this->plan;
                break;
            case 203:
                $this->dept=$this->operation;
                break;
            default:
                $this->dept='Unrecognized management';
        }
    }
    public function getDept()
    {
        // TODO: Implement getDept() method.
        return $this->dept;
    }
}
class Client{
    private $market;
    private $manage;
    public function __construct()
    {
        $this->makeConProto();
        $m1=clone $this->market;
        $this->setEmp($m1,'sb','101');
        $this->showEmp($m1);

        $m2=clone $this->market;
        $this->setEmp($m2,'sb2','104');
        $this->showEmp($m2);

        $man=clone $this->manage;
        $this->setEmp($man,'man1','202');
        $this->showEmp($man);
    }
    private function makeConProto(){
        $this->market=new Marketing();
        $this->manage=new Management();
    }
    private function showEmp(IAcmePrototype $emp){
        echo $emp->getName().'<br>';
        echo $emp->getDept().'<br>';

    }
    private function setEmp(IAcmePrototype $emp,$name,$dept){
        $emp->setName($name);
        $emp->setDept($dept);
    }
}
$work=new Client();
