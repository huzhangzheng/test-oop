<?php
    class Request{
        private $value;
        public function __construct($service)
        {
            $this->value=$service;
        }
        public function getService(){
            return $this->value;
        }
    }
    abstract class Handler{
        protected $successor;
        protected $handle;
        abstract public function handlerRequest($request);
        abstract public function setSuccessor($nextService);
    }
    class Q1 extends Handler{
        public function setSuccessor($nextService)
        {
            $this->successor=$nextService;
        }
        public function handlerRequest($request)
        {
            $this->handle='q11';
            if($request->getService()==$this->handle){
                echo 'q11';
            }else if($this->successor!=null){
                $this->successor->handlerRequest($request);
            }
        }
    }
    class Q2 extends Handler{
        public function setSuccessor($nextService)
        {
            $this->successor=$nextService;
        }
        public function handlerRequest($request)
        {
            $this->handle='q2';
            if($request->getService()==$this->handle){
                echo 'q14234543';
            }else if($this->successor!=null){
                $this->successor->handlerRequest($request);
            }
        }
    }
    class Q3 extends Handler{
        public function setSuccessor($nextService)
        {
            $this->successor=$nextService;
        }
        public function handlerRequest($request)
        {
            $this->handle='q1';
            if($request->getService()==$this->handle){
                echo 'q3';
            }else if($this->successor!=null){
                $this->successor->handlerRequest($request);
            }
        }
    }
    class Client{
        private $query;
        public function __construct()
        {
            $this->query='q1';
            $q1=new Q1();
            $q2=new Q2();
            $q3=new Q3();
            //设置后继
            $q1->setSuccessor($q2);
            $q2->setSuccessor($q3);
            $load=new Request($this->query);
            $q1->handlerRequest($load);
        }

    }
$work=new Client();
?>