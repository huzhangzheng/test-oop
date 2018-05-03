<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/4
 * Time: 0:10
 */
abstract class IHook{
    protected $purchased;
    protected $hookSpecial;
    protected $ship;
    protected $all_total;
    public function templateMethod($total,$special){
        $this->purchased=$total;
        $this->hookSpecial=$special;
        $this->addTax();
        $this->addFree();
        $this->display();
    }
    protected abstract function addTax();
    protected abstract function addFree();
    protected abstract function display();
}
class Calculate extends IHook{
    protected function addTax()
    {
        // TODO: Implement addTax() method.
        $this->all_total=$this->purchased*(1+0.07);
    }
    protected function addFree()
    {
        // TODO: Implement addFree() method.
        if(!$this->hookSpecial){
            $this->all_total+=12.88;
        }
    }
    protected function display()
    {
        // TODO: Implement display() method.
        echo $this->all_total;
    }
}
class Client{
    function __construct()
    {
        $a=new Calculate();
        $a->templateMethod('300',false);
    }
}
$work=new Client();