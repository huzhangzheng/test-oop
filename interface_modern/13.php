<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/1
 * Time: 15:44
 */
abstract class IComponent{
    protected $date;
    protected $ageGroup;
    protected $feature;
    abstract public function setAge($age);
    abstract public function getAge();
    abstract public function getFeature();
    abstract public function setFeature($fea);
}
class Male extends IComponent{
    public function __construct()
    {
        $this->date='male';
        $this->setFeature("<br> dude programmer features: ");
    }
    public function getAge(){
        return $this->ageGroup;
    }
    public function setAge($age){
        $this->ageGroup=$age;
    }
    public function getFeature(){
        return $this->feature;
    }
    public function setFeature($fea){
        $this->feature=$fea;
    }
}
class FeMale extends IComponent{
    public function __construct()
    {
        $this->date='female';
        $this->setFeature("<br>girl programmer features: ");
    }
    public function getAge(){
        return $this->ageGroup;
    }
    public function setAge($age){
        $this->ageGroup=$age;
    }
    public function getFeature(){
        return $this->feature;
    }
    public function setFeature($fea){
        $this->feature=$fea;
    }
}
abstract class Decorator extends IComponent{
    public function setAge($age)
    {
        // TODO: Implement setAge() method.
        $this->ageGroup=$age;
    }
    public function getAge()
    {
        // TODO: Implement getAge() method.
        return $this->ageGroup;
    }
}
class Program extends Decorator{
    private $language;
    public function __construct(IComponent $date)
    {
        $this->date=$date;
    }
    private $language_arr=['php'=>"php",'js'=>"javascript"];
    public function setFeature($lan){
        $this->language=$this->language_arr[$lan];
    }
    public function getFeature(){
        $output=$this->date->getFeature();
        $fmt="<br>&nbsp;&nbsp;";
        $output.=$fmt.'preferred program language:';
        $output.=$this->language;
        return $output;
    }
}
class Hardware extends Decorator{
    private $hardware;
    public function __construct(IComponent $date)
    {
        $this->date=$date;
    }
    private $hardware_arr=['dell'=>"Dell",'lin'=>"Linux"];
    public function setFeature($hard){
        $this->hardware=$this->hardware_arr[$hard];
    }
    public function getFeature(){
        $output=$this->date->getFeature();
        $fmt="<br>&nbsp;&nbsp;";
        $output.=$fmt.'current hardware:';
        $output.=$this->hardware;
        return $output;
    }
}
class Food extends Decorator{
    private $chown;
    public function __construct(IComponent $date)
    {
        $this->date=$date;
    }
    private $chown_arr=['piz'=>"pizza",'veg'=>"veggies"];
    public function setFeature($yum){
        $this->chown=$this->chown_arr[$yum];
    }
    public function getFeature(){
        $output=$this->date->getFeature();
        $fmt="<br>&nbsp;&nbsp;";
        $output.=$fmt.'favorite food:';
        $output.=$this->chown;
        return $output;
    }
}
class Film extends Decorator{
    private $film;
    public function __construct(IComponent $date)
    {
        $this->date=$date;
    }
    private $film_arr=['love'=>"Love",'action'=>"Action"];
    public function setFeature($film){
        $this->film=$this->film_arr[$film];
    }
    public function getFeature(){
        $output=$this->date->getFeature();
        $fmt="<br>&nbsp;&nbsp;";
        $output.=$fmt.'favorite film:';
        $output.=$this->film;
        return $output;
    }
}
class Client{
    private $date;
    public function __construct()
    {
        $this->date=new FeMale();
        $this->date->setAge('Age Group 4');
        echo $this->date->getAge();
        $this->date=$this->wrapComponent($this->date);
        echo $this->date->getFeature();
    }
    private function wrapComponent(IComponent $component){
        $component=new Program($component);
        $component->setFeature('php');
        $component=new Hardware($component);
        $component->setFeature('lin');
        $component=new Food($component);
        $component->setFeature('veg');
        $component=new Film($component);
        $component->setFeature('love');
//        print_r($component);die;
        return $component;
    }
}
$work=new Client();