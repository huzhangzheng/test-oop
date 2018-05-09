<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/9
 * Time: 22:46
 */
abstract class Subject{
    protected $state;
    protected $observers=array();
    public function attach(Observer $observer){
        array_push($this->observers,$observer);
    }
    public function detach(Observer $observer){
        $position=0;
        foreach($this->observers as $viewer){
            if($viewer==$observer){
                array_splice($this->observers,$position,1);
            }
            ++$position;
        }
    }
    protected function notify(){
        foreach($this->observers as $viewer){
            $viewer->update($this);
        }
    }
}
class ConcreSubject extends Subject{
    public function setState($state){
        $this->state=$state;
        $this->notify();
    }
    public function getState(){
        return $this->state;
    }
}
interface Observer{
    function update(Subject $subject);
}
class ObserverDt implements Observer{
    public function update(Subject $subject)
    {
        $this->state=$subject->getState();
        echo 'tv get '.$this->state.'<br>';
    }
}
class ObserverPhone implements Observer{
    public function update(Subject $subject)
    {
        $this->state=$subject->getState();
        echo 'Phone get '.$this->state.'<br>';
    }
}
class ObserverTablet implements Observer{
    public function update(Subject $subject)
    {
        $this->state=$subject->getState();
        echo 'tablet get '.$this->state.'<br>';
    }
}
class Client{
    public function __construct()
    {
        $sub=new ConcreSubject();
        $ob1=new ObserverDt();
        $ob2=new ObserverPhone();
        $ob3=new ObserverTablet();
        $sub->attach($ob1);
        $sub->attach($ob2);
        $sub->attach($ob3);
        $sub->setState('shit');
        echo '<hr>';
        $sub->detach($ob2);
        $sub->setState('shit');
    }
}
$work=new Client();