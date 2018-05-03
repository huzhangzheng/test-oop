<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/3
 * Time: 23:07
 */
abstract class AbstractClass{
    protected $pix;
    protected $cap;
    public function templateMethod($pix,$cap){
        $this->addPix($pix);
        $this->addCap($cap);
    }
    abstract protected function addPix($pix);
    abstract protected function addCap($cap);
}
class ConcreteClass extends AbstractClass{
    protected function addPix($pix)
    {
        // TODO: Implement addPix() method.
        echo '<img src="'.$pix.'">';
    }
    protected function addCap($cap)
    {
        // TODO: Implement addCap() method.
//        $this->cap=$cap;
        echo $cap;
    }
}
class Client{
    function __construct()
    {
        $mo=new ConcreteClass();
        $mo->templateMethod('1-120324131913-lp.jpg','42425fdssdf');
    }
}
$work=new Client();