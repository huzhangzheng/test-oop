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
        $this->pix=new GraphicFactory();
        echo $this->pix->doFactory();
    }
    protected function addCap()
    {
        // TODO: Implement addPix() method.
        $this->cap=new TextFactory();
        echo $this->cap->doFactory();
    }
}
abstract class Creator{
    protected abstract function factoryMethod();
    public function doFactory(){
        return $this->factoryMethod();
    }
}

class GraphicFactory extends Creator{
    protected function factoryMethod(){
        $product=new GraphicProduct();
        return $product->getProperties();
    }
}
class TextFactory extends Creator{
    protected function factoryMethod(){
        $product=new TextProduct();
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
        return '1114fgfgddf';
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