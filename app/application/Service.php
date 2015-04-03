<?php

class Service{
    
    public function run($params=array()){
        $app  = new Yaf_Application(APP_PATH . "/conf/application.ini");

        $uri = Yaf_Dispatcher::getInstance()->getRequest()->getRequestUri();
        list($tmp,$module,$controller,$action) = explode('/', $uri);

        foreach ($params as $key => $value) {
            Yaf_Dispatcher::getInstance()->getRequest()->setParam($key,$value);
        }
        
        $request = new Yaf_Request_Simple("Api", $module, $controller, $action, $params);
        // $request = new Yaf_Request_Simple("Api", "User", "Index", "demo", array());

        // Yaf_Dispatcher::getInstance()->getRequest()->setParam('uid',123456);

        $response = $app->bootstrap()->getDispatcher()->returnResponse(TRUE)->dispatch($request);
        // $response = $app->bootstrap()->getDispatcher()->dispatch($request);
        return $response->getBody();
    }

}