<?php
/**
 * 基于php SPL库的观察者模式
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/9
 * Time: 22:06
 */
class ConcreSubject implements SplSubject{
    private $observers;
    private $data;
    public function setObservers(){
        $this->observers=new SplObjectStorage();
    }
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }
    public function notify()
    {
        foreach($this->observers as $observer){
            $observer->update($this);
        }
    }
    public function setData($data){
        $this->data=$data;
    }
    public function getData(){
        return $this->data;
    }
}
class ConcreObserver implements SplObserver{
    public function update(SplSubject $subject)
    {
        echo $subject->getData().'<br>';
    }
}
class Client{
    public function __construct()
    {
        $ob1=new ConcreObserver();
        $ob2=new ConcreObserver();
        $ob3=new ConcreObserver();
        $subject=new ConcreSubject();
        $subject->setObservers();
        $subject->setData('hahaha');
        $subject->attach($ob1);
        $subject->attach($ob2);
        $subject->attach($ob3);
        $subject->notify();
        echo '<hr>';
        $subject->detach($ob2);
        $subject->notify();
        echo '<hr>';
        $subject->attach($ob2);
        $subject->setData('胡彰正说他是傻逼，望周知');
        $subject->notify();
    }
}
$work=new Client();