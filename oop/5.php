<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/4/26
 * Time: 15:04
 */
class XmlException extends Exception{
    private $error;
    function __construct(LibXMLError $error)
    {
        $shortfile=basename($error->file);
        $msg="[{$shortfile},line {$error->line},col {$error->column}] ---{$error->message}";
        $this->error=$error;
        parent::__construct($msg, $error->code);
    }
    function getLibXmlError(){
        return $this->error;
    }
}
class FileException extends Exception{}
class ConfException extends Exception{}

class Conf{
    private $file;
    private $xml;
    private $lastmatch;
    function __construct($file)
    {
        if(!file_exists($file)){
            throw new FileException('file not exist');
        }
        $this->file=$file;
        $this->xml=simplexml_load_file($file,null,LIBXML_NOERROR);
        if(!is_object($this->xml)){
            throw new XmlException(libxml_get_last_error());
        }
        print gettype($this->xml);
        $matches=$this->xml->xpath("/conf");
        if(!count($matches)){
            throw new ConfException('cant find "conf" element');
        }
    }
    function write(){
        if(!is_writable($this->file)){
            throw new FileException('file not writeable');
        }
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
        $this->xml->addChild('item',$value)->addAttribute('name',$key);
    }
}

class Runner{
    static function init(){
        try{
            $conf=new Conf('conf1.xml');
            print_r($conf->get('user'));
            print_r($conf->get('host'));
            $conf->set('pass2','newpass');
            $conf->write();
        }catch(FileException $e){
            die($e->__toString());
        }catch(XmlException $e){
            print_r($e->getLibXmlError());
        }catch(ConfException $e){
            die($e->__toString());
        }catch(Exception $e){
            die($e->__toString());
        }
    }
}
Runner::init();