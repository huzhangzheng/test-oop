<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/4/14
 * Time: 21:27
 */
interface IProduct{
    public function apples();
    public function oranges();
}
class AppleStore implements IProduct{
    public function apples()
    {
        return 'we have apples<br>';
    }
    public function oranges()
    {
        return 'we have no oranges<br>';
    }
}
class OrangeStore implements IProduct{
    public function apples()
    {
        return 'we have no apples<br>';
    }
    public function oranges()
    {
        return 'we have oranges<br>';
    }
}
class MyStore{
    public function apples()
    {
        return 'we have no apples<br>';
    }
    public function oranges()
    {
        return 'we have no oranges<br>';
    }
}

class UseProducts{
    public function __construct()
    {
        $apple=new AppleStore();
        $orange=new OrangeStore();
        $myfruit=new MyStore();

        $this->doInterface($apple);
        $this->doInterface($orange);
        $this->doInterface($myfruit);
    }
    public function doInterface(IProduct $product){
        echo $product->apples();
        echo $product->oranges();
    }
}
$worker=new UseProducts();

?>