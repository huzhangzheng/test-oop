<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/4/20
 * Time: 22:24
 */
abstract class Creator{
    protected abstract function factoryMethod(Product $product);
    public function startFactory($product){
        $mfg=$this->factoryMethod($product);
        return $mfg;
    }
}
class Factory extends Creator{
    protected function factoryMethod(Product $product)
    {
        // TODO: Implement factoryMethod() method.
        return $product->getProperties();
    }
}

interface Product{
    public function getProperties();
}
class NewProduct implements Product{
    private $mfgProduct;
    public function getProperties()
    {
        // TODO: Implement getProperties() method.
        $this->mfgProduct='this is text11';
        $this->mfgProduct.='<img src="1-120324131913-lp.jpg" height="200" width="100">';
        return $this->mfgProduct;
    }
}
class NewProduct2 implements Product{
    private $mfgProduct;
    public function getProperties()
    {
        // TODO: Implement getProperties() method.
        $this->mfgProduct='this is text22';
        $this->mfgProduct.='<img src="1-120324131913-lp.jpg" height="200" width="100">';
        return $this->mfgProduct;
    }
}

class Client{
    private $obj;
    public function __construct()
    {
        $this->obj=new Factory();
        echo $this->obj->startFactory(new NewProduct2()).'<br>';
    }
}
$worker=new Client();