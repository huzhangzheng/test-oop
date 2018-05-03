<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/4/25
 * Time: 22:12
 */
class DollarCalc{
    private $dollar;
    private $product;
    private $service;
    public $rate=1;
    public function requestCalc($product,$service){
        $this->product=$product;
        $this->service=$service;
        $this->dollar=$this->product+$this->service;
        return $this->dollar*=$this->rate;
    }
}
interface ITarget{
}
class EuroAdapter extends DollarCalc implements ITarget{
    public function __construct()
    {
        $this->rate=.8111;
    }
}
class Client{
    private $request;
    private $dollarQuest;
    public function __construct()
    {
        $this->request=new EuroAdapter();
        $this->dollarQuest=new DollarCalc();
        echo $this->makeAdapterRequest($this->request);
        echo '<br>';
        echo $this->makeDollarRequest($this->dollarQuest);
    }
    private function makeAdapterRequest(ITarget $req){
        return $req->requestCalc(40,50);
    }
    private function makeDollarRequest(DollarCalc $req){
        return $req->requestCalc(40,50);
    }
}
$work=new Client();