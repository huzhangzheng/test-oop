<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/4/26
 * Time: 15:04
 */
class Conf{
    private $file;
    private $xml;
    private $lastmatch;
    function __construct($file)
    {
        if(!file_exists($file)){
            throw new Exception('file not exist');
        }
        $this->file=$file;
        $this->xml=simplexml_load_file($file);
    }
    function write(){
        file_put_contents($this->file,$this->xml->asXML());
    }
    function get($str){
        $matches=$this->xml->xpath('/conf/item[@name="'.$str.'"]');
        if(count($matches)){
            $this->lastmatch=$matches[0];
            return (string)$matches[0];
        }
        return null;
    }
    function set($key,$value){
        if(!is_null($this->get($key))){
            $this->lastmatch=$value;
            return;
        }
//        $conf=$this->xml->conf;
        $this->xml->addChild('item',$value)->addAttribute('name',$key);
    }
}
try{
    $conf=new Conf('conf.xml');
    print_r($conf->get('user'));
    print_r($conf->get('host'));
    $conf->set('pass1','newpass');
    $conf->write();
}catch(Exception $e){
    die($e->__toString());
}