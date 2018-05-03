<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/4/20
 * Time: 22:24
 */
abstract class Creator{
    protected abstract function factoryMethod();
    public function startFactory(){
        $mfg=$this->factoryMethod();
        return $mfg;
    }
}
class TextFactory extends Creator{
    protected function factoryMethod()
    {
        // TODO: Implement factoryMethod() method.
        $product=new TextProduct();
        return $product->getProperties();
    }
}
class GraphicFactory extends Creator{
    protected function factoryMethod()
    {
        // TODO: Implement factoryMethod() method.
        $product=new GraphicProduct();
        return $product->getProperties();
    }
}
interface Product{
    public function getProperties();
}
class TextProduct implements Product{
    private $mfgProduct;
    public function getProperties()
    {
        // TODO: Implement getProperties() method.
        $this->mfgProduct='this is text';
        return $this->mfgProduct;
    }
}
class GraphicProduct implements Product{
    private $mfgProduct;
    public function getProperties()
    {
        // TODO: Implement getProperties() method.
//        $this->mfgProduct='this is graphic';
        $this->mfgProduct='<img src="1-120324131913-lp.jpg" height="200" width="100">';
        return $this->mfgProduct;
    }
}
class Client{
    private $textobj;
    private $graphicobj;
    public function __construct()
    {
        $this->textobj=new TextFactory();
        echo $this->textobj->startFactory().'<br>';
        $this->graphicobj=new GraphicFactory();
        echo $this->graphicobj->startFactory();
    }
}
$worker=new Client();