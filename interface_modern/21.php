<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/5/7
 * Time: 23:43
 */
class Context{
    private $strategy;
    public function __construct(IStrategy $strategy)
    {
        $this->strategy=$strategy;
    }
    public function algoritm(){
        $this->strategy->algoritm();
    }
}
interface IStrategy{
    public function algoritm();
}
class DataEntry implements IStrategy{
    public function algoritm()
    {
        echo '嘿嘿,插进去了';
    }
}
class Search implements IStrategy{
    public function algoritm()
    {
        echo '嘿嘿,找到了';
    }
}
class Client{
    public function insertData(){
        $context=new Context(new DataEntry());
        $context->algoritm();
    }
    public function search(){
        $context=new Context(new Search());
        $context->algoritm();
    }
}
$work=new Client();
$work->insertData();
$work->search();