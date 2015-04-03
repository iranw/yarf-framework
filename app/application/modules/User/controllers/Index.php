<?php

class IndexController Extends Yaf_Controller_Abstract {
    function init() {
        Yaf_Dispatcher::getInstance()->disableView();
    }

    public function getAction($uid=0){
        $uid = $this->getRequest()->getParam('uid',0);
        $response = 'Get Uid:'.$uid;
        $this->getResponse()->setBody($response);
    }

    public function delAction($uid=0){
        $uid = $this->getRequest()->getParam('uid',0);
        $response = 'Del Uid:'.$uid;
        $this->getResponse()->setBody($response);
    }



}