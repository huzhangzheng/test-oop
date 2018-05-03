<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/4/26
 * Time: 22:39
 */
abstract class ICompnent{
    protected $site;
    abstract public function getPrice();
    abstract public function getSite();
}
abstract class Decorator extends ICompnent{

}
class BasicSite extends ICompnent{
    public function __construct()
    {
        $this->site='Basic Site';
    }

    public function getSite()
    {
        return $this->site;
    }
    public function getPrice()
    {
        // TODO: Implement getPrice() method.
        return 1200;
    }
}
class Maintenance extends Decorator{
    public function __construct(ICompnent $site)
    {
        $this->site=$site;
    }
    public function getSite()
    {
        // TODO: Implement getSite() method.
        return $this->site->getSite()."<br>&nbsp;&nbsp;Maintenance";
    }
    public function getPrice()
    {
        // TODO: Implement getPrice() method.
        return 950+$this->site->getPrice();
    }
}
class Video extends Decorator{
    public function __construct(ICompnent $site)
    {
        $this->site=$site;
    }
    public function getSite()
    {
        // TODO: Implement getSite() method.
        return $this->site->getSite()."<br>&nbsp;&nbsp;Video";
    }
    public function getPrice()
    {
        // TODO: Implement getPrice() method.
        return 350+$this->site->getPrice();
    }
}
class Database extends Decorator{
    public function __construct(ICompnent $site)
    {
        $this->site=$site;
    }
    public function getSite()
    {
        // TODO: Implement getSite() method.
        return $this->site->getSite()."<br>&nbsp;&nbsp;Database";
    }
    public function getPrice()
    {
        // TODO: Implement getPrice() method.
        return 800+$this->site->getPrice();
    }
}
class Client{
    private $site;
    public function __construct()
    {
        $this->site=new BasicSite();
        $this->site=$this->wrapCompnent($this->site);

        $siteshow=$this->site->getSite();
        $format="<br>&nbsp;&nbsp;<strong>Total=$";
        $price=$this->site->getPrice();
        echo $siteshow.$format.$price."</strong>";
    }
    private function wrapCompnent(ICompnent $component){
        $component=new Maintenance($component);
        $component=new Video($component);
//        $component=new Database($component);
        return $component;
    }
}
$work=new Client();