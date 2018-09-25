<?php
/**
 * Created by PhpStorm.
 * User: hzz
 * Date: 2018/8/8 10:28
 */

//1.简单插入
$manager= new \MongoDB\Driver\Manager('mongodb://localhost:27017');
$bulk= new \MongoDB\Driver\BulkWrite;
$document=['_id'=>new \MongoDB\BSON\ObjectId,'name'=>'菜鸟'];
$_id=$bulk->insert($document);
var_dump($_id);

$writeConcern = new \MongoDB\Driver\WriteConcern(\MongoDB\Driver\WriteConcern::MAJORITY,1000);
$result= $manager->executeBulkWrite('test.runoob',$bulk,$writeConcern);

//2.读取数据
//$manager= new \MongoDB\Driver\Manager('mongodb://localhost:27017');
//
////插入
//$bulk= new \MongoDB\Driver\BulkWrite;
//$bulk->insert(['x'=>1,'name'=>'菜鸟教程']);
//$bulk->insert(['x'=>2,'name'=>'google']);
//$bulk->insert(['x'=>3,'name'=>'taobao']);
//
//$manager->executeBulkWrite('test.sites',$bulk);
//
//$filter=['x'=>['$gt'=>1]];
//$options=[
//    'projection'=>['_id'=>0],
//    'sort'=>['x'=>-1]
//];
//
////查询
//$query= new \MongoDB\Driver\Query($filter,$options);
//$cursor= $manager->executeQuery('test.sites',$query);
//
//foreach ($cursor as $document){
//    print_r($document);
//}