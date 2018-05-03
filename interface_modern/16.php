<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/3
 * Time: 23:49
 */
abstract class TmAb{
    protected $pix;
    protected $cap;
    public function templateMethod(){
        $this->addPix();
        $this->addCap();
    }
    protected abstract function addPix();
    protected abstract function addCap();
}
class TmFac extends TmAb{
    protected function addPix()
    {
        // TODO: Implement addPix() method.
        $this->pix=new OneFactory();
        echo $this->pix->doFactory(new GraphicProduct());
    }
    protected function addCap()
    {
        // TODO: Implement addPix() method.
        $this->cap=new OneFactory();
        echo $this->cap->doFactory(new TextProduct());
    }
}
abstract class Creator{
    protected abstract function factoryMethod(IProduct $product);
    public function doFactory($product){
        return $this->factoryMethod($product);
    }
}

class OneFactory extends Creator{
    protected function factoryMethod(IProduct $product){
        return $product->getProperties();
    }
}
interface IProduct{
    public function getProperties();
}
class GraphicProduct implements IProduct{
    public function getProperties()
    {
        // TODO: Implement getProperties() method.
        return '<img src="1-120324131913-lp.jpg">';
    }
}
class TextProduct implements IProduct{
    public function getProperties()
    {
        // TODO: Implement getProperties() method.
        return '1114fgfgddf1616';
    }
}
class Client{
    function __construct()
    {
        $mo=new TmFac();
        $mo->templateMethod();
    }
}
$work=new Client();