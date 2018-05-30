<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/5/29 14:51
 */

class mysql
{
    function connect($db)
    {
        echo "连接到数据库{$db[0]}".PHP_EOL;
    }
}
class sqlproxy
{
    private $target;
    public function __construct($tar)
    {
        $this->target[] = new $tar;
    }
    public function __call($name,$args)
    {
        foreach($this->target as $obj)
        {
            $r = new ReflectionClass($obj);
            if($method = $r->getMethod($name))
            {
                if($method->isPublic() && !$method->isAbstract())
                {
                    echo "方法前拦截记录LOG".PHP_EOL;
                    $method->invoke($obj,$args);
                    echo "方法后拦截".PHP_EOL;
                }
            }
        }
    }
}
$obj = new sqlproxy('mysql');
$obj->connect('chenqionghe');