<?php

class IndexController Extends Yaf_Controller_Abstract {
    function init() {
        Yaf_Dispatcher::getInstance()->disableView();

    }

    public function demoAction($a=array()){
        echo $this->getRequest()->getParam("name");

        print_r($this->getRequest()->getParams());
        $this->getResponse()->setBody('333333');
    }

    public function getAction($uid=0){
        $uid = $this->getRequest()->getParam('uid',0);

        $response = 'uid:'.$uid;
        $this->getResponse()->setBody($response);
    }



    public function loginAction() {//默认Action
        $this->getResponse()->setBody('/user/index/login');
        // echo '/user/index/login';
        // $a = new \Iran\Funccc\StringHelp();
        // $b = new \Iran\Func\StringHelp();
        // echo "<br>";
        // \Iran\Funcc\StringHelp::dd();

        $users = DB::select('SELECT * FROM f_account where aid=1');
        print_r($users);
        // StrHelp::dd();
        
        // $a::dd();

        // $request = new Yaf_Request_Simple("Api", "User", "Index", "login", array());
        


        // Yaf_Dispatcher::getInstance()->disableView();

        // print_r($request);

        // // $users = DB::select('SELECT * FROM f_account where aid=1');
        // $users = DB::insert('INSERT INTO `product`(username) VALUES("sad")');
        // // $users = DB::connection('test')->select('SELECT * FROM `product` LIMIT 10');

        // $users = DB::select('SELECT * FROM `product`');



        // $users = Test2::test();
        // $users = DB::table('f_account')->where('aid', '=', 1)->get();
        // // $users = Capsule::select('SELECT * FROM f_account limit 10');
        // $users = Account::where('aid', '=', 1)->get();
        // print_r($users);

        // echo Capsule::getConnection();

        // $ob = Test::get();

        // $a = new Test;
        // $a->name = 'aaaa';
        // $a->save();

        // print_r($ob);/


        // echo 'asdf23';
        // echo date('Y-m-d H:i:s',time());
        // echo Account::aaaa();
        // exit();

        // $productRepository = Yaf_Registry::get("Entity")->getRepository('Account');
        // $products = $productRepository->find(1);
        // print_r($products);exit();
	}
}