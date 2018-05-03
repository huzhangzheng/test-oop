<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/4/24
 * Time: 22:10
 */
abstract class IPrototype{
    public $eyeColor;
    public $wingBeat;
    public $unitEyes;
    abstract function __clone();
}
class MaleProto extends IPrototype{
    const GENDER ='male';
    public $mated;
    public function __construct()
    {
        $this->eyeColor='red';
        $this->wingBeat='220';
        $this->unitEyes='760';
    }
    public function __clone()
    {
        // TODO: Implement __clone() method.
    }
}
class FemaleProto extends IPrototype{
    const GENDER='female';
    public $fecundity;
    public function __construct()
    {
        $this->eyeColor='red';
        $this->wingBeat='220';
        $this->unitEyes='760';
    }

    function __clone()
    {
        // TODO: Implement __clone() method.
    }
}
class Client{
    private $fly1;
    private $fly2;
    private $c1fly;
    private $c2fly;
    private $updatedCloneFly;
    public function __construct()
    {
        $this->fly1=new MaleProto();
        $this->fly2=new FemaleProto();
        $this->c1fly=clone $this->fly1;
        $this->c2fly=clone $this->fly2;
        $this->updatedCloneFly=clone $this->c2fly;

        $this->c1fly->mated='true';
        $this->c2fly->fecundity='186';
        $this->updatedCloneFly=clone $this->c2fly;
        $this->updatedCloneFly->eyeColor='purple';
        $this->updatedCloneFly->fecundity='92';
        $this->showFly($this->c1fly);
        echo '<hr>';
        $this->showFly($this->c2fly);
        echo '<hr>';
        $this->showFly($this->updatedCloneFly);
    }
    private function showFly(IPrototype $fly){
        echo $fly->eyeColor.'<br>';
        echo $fly->wingBeat.'<br>';
        echo $fly->unitEyes.'<br>';
        $gender=$fly::GENDER;
        echo $gender.'<br>';
        if($gender=='female'){
            echo $fly->fecundity;
        }else{
            echo $fly->mated;
        }
    }
}
$work=new Client();