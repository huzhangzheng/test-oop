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
    private $brighterState;
    private $brightestState;
    private $curState;
    public function __construct()
    {
        $this->offState=new OffState($this);//自引用
        $this->onState=new OnState($this);
        $this->brighterState=new BrighterState($this);
        $this->brightestState=new BrightestState($this);
        $this->curState=$this->offState;
    }
    public function turnOn(){
        $this->curState->turnOn();
    }
    public function turnOff(){
        $this->curState->turnOff();
    }
    public function turnBrighter(){
        $this->curState->turnBrighter();
    }
    public function turnBrightest(){
        $this->curState->turnBrightest();
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
    public function getBrighterState(){
        return $this->brighterState;
    }
    public function getBrightestState(){
        return $this->brightestState;
    }
}
interface IState{
    public function turnOn();
    public function turnOff();
    public function turnBrighter();
    public function turnBrightest();
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
        echo '此时不能关，只能变亮<br>';
    }
    public function turnBrighter()
    {
        // TODO: Implement turnOn() method.
        echo 'light turnBrighter！ <br>';
        $this->context->setState($this->context->getBrighterState());
    }
    public function turnBrightest()
    {
        // TODO: Implement turnOff() method.
        echo 'light turnBrightest error！ <br>';
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
    public function turnBrighter()
    {
        // TODO: Implement turnOn() method.
        echo 'light  turnBrighter error！ <br>';
    }
    public function turnBrightest()
    {
        // TODO: Implement turnOff() method.
        echo 'light turnBrightest error！ <br>';
    }
}
class BrighterState implements IState{
    private $context;
    public function __construct(Context $context)
    {
        $this->context=$context;
    }

    public function turnOff()
    {
        echo '不能关 <br>';
    }
    public function turnOn()
    {
        echo '不能开 <br>';
    }
    public function turnBrighter()
    {
        // TODO: Implement turnOn() method.
        echo '已经是比较亮了！ <br>';
    }
    public function turnBrightest()
    {
        echo 'light brightest!<br>';
        $this->context->setState($this->context->getBrightestState());
    }
}
class BrightestState implements IState{
    private $context;
    public function __construct(Context $context)
    {
        $this->context=$context;
    }

    public function turnOff()
    {
        echo '已经关了 <br>';
        $this->context->setState($this->context->getOffState());

    }
    public function turnOn()
    {
        echo '不能开 <br>';
    }
    public function turnBrighter()
    {
        // TODO: Implement turnOn() method.
        echo 'light  turnBrighter error！ <br>';
    }
    public function turnBrightest()
    {
        echo '已经最亮了light brightest!<br>';
    }
}

class Client{
    private $context;
    public function __construct()
    {
        $this->context=new Context();
        $this->context->turnOn();
        $this->context->turnBrighter();
        $this->context->turnBrightest();
        $this->context->turnOff();
        $this->context->turnBrightest();
    }
}
$work=new Client();