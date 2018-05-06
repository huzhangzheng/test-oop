<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/5
 * Time: 15:41
 */
class Context{
    private $offState;
    private $onState;
    private $curState;
    public function __construct()
    {
        $this->offState=new OffState($this);//自引用
        $this->onState=new OnState($this);
        $this->curState=$this->offState;
    }
    public function turnOn(){
        $this->curState->turnOn();
    }
    public function turnOff(){
        $this->curState->turnOff();
    }
    public function setState(IState $state){
        $this->curState=$state;
    }
    public function getOnState(){
        return $this->onState;
    }
    public function getOffState(){
        return $this->offState;
    }
}
interface IState{
    public function turnOn();
    public function turnOff();
}
class OnState implements IState{
    private $context;
    public function __construct(Context $context)
    {
        $this->context=$context;
    }

    public function turnOn()
    {
        // TODO: Implement turnOn() method.
        echo 'light is already on->take no action <br>';
    }
    public function turnOff()
    {
        // TODO: Implement turnOff() method.
        echo 'light off<br>';
        $this->context->setState($this->context->getOffState());
    }
}
class OffState implements IState{
    private $context;
    public function __construct(Context $context)
    {
        $this->context=$context;
    }

    public function turnOff()
    {
        echo 'light is already off->take no action <br>';
    }
    public function turnOn()
    {
        echo 'light on! now i can  see <br>';
        $this->context->setState($this->context->getOnState());
    }
}
class Client{
    private $context;
    public function __construct()
    {
        $this->context=new Context();
        $this->context->turnOn();
        $this->context->turnOn();
        $this->context->turnOff();
        $this->context->turnOff();
    }
}
$work=new Client();