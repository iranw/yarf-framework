<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
/**
 * 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf_Bootstrap_Abstract{

    public function _initConfig(Yaf_Dispatcher $dispatcher) {
        $config = Yaf_Application::app()->getConfig();
        Yaf_Registry::set("config", $config);

        $sysConfig = include APP_PATH . "/conf/config.php";
        Yaf_Registry::set("sysConfig", $sysConfig);

        $dispatcher->autoRender(FALSE);//全局关闭渲染
    }

    public function _initDefaultName(Yaf_Dispatcher $dispatcher) {
        $dispatcher->setDefaultModule("Index")->setDefaultController("Index")->setDefaultAction("index");
    }

    public function _initRoute(Yaf_Dispatcher $dispatcher) {
        $router = $dispatcher->getRouter();
        $router->addRoute("userlogin",new Yaf_Route_rewrite("/user/login",array('module'=>'user','controller' => "index", 'action' => "login", )));        
    }

    public function _initEntity(){
        $sysConfig = Yaf_Registry::get("sysConfig");
        $capsule = new Capsule;
        foreach ($sysConfig['mysql'] as $name => $dbParam) {
            $capsule->addConnection($dbParam,$name);
        }
        // Set the event dispatcher used by Eloquent models... (optional)        
        $capsule->setEventDispatcher(new Dispatcher(new Container));
        // // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();
        // // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
    }

    // public function _initMemcached(){
    //     $sysConfig = Yaf_Registry::get("sysConfig");
    //     $capsule = new Capsule;
    //     foreach ($sysConfig['mysql'] as $name => $dbParam) {
    //         $capsule->addConnection($dbParam,$name);
    //     }
    //     // Set the event dispatcher used by Eloquent models... (optional)        
    //     $capsule->setEventDispatcher(new Dispatcher(new Container));
    //     // // Make this Capsule instance available globally via static methods... (optional)
    //     $capsule->setAsGlobal();
    //     // // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
    //     $capsule->bootEloquent();
    // }

    //Alias class name
    public function _initAlias(){
        $appConfig = include APP_PATH . "/conf/app.php";
        $aliasArray = $appConfig['aliases'];
        spl_autoload_register(function($alias) use ($aliasArray){
            if (isset($aliasArray[$alias])){
                return class_alias($aliasArray[$alias], $alias);
            }
        }, true, true);
    }

}