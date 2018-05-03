<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/4/14
 * Time: 22:49
 */
class PrivateVis{
    private $money;
    public function __construct()
    {
        $this->money=200;
        $this->secret();
    }
    private function secret(){
        echo $this->money;
    }
}
$work=new PrivateVis();

abstract class ProtectVis{
    public $wage=20;
    abstract protected function countMoney();
    protected function setHourly($hourly){
        $money=$hourly;
        return $money;
    }
}
class ConcreteProtect extends ProtectVis{
    public function __construct()
    {
        $this->wage='sb';
    }

     function countMoney()
    {
        echo $this->wage;
        echo $this->setHourly(36);
    }
}
$protectwork = new ConcreteProtect();
$protectwork->countMoney();
echo $protectwork->wage;
?>