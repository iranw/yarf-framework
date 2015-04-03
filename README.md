
# Yarf框架

专为接口而生，专注于数据提供开发的Yarf框架。基于yaf+yar(快速请求，并发处理)

####功能实现

> * 识别Post/Get接口请求
> * 实现Restful请求
> * 实现Yar单请求以及并发请求

###框架目录

    ###### 组织架构如下: 
        yarf-root                                       //根目录(irpackagis这个无所谓随便起)
            |---README.md                               //帮助文档
            |---composer.json                           //固定格式文件(必须)
            |---vendor                                  //第三方类库包目录
            |---public                                  //入口目录
                  |---index.php                         //入口文件
            |---app
                  |---application
                        |---controllers
                        |---library
                        |---models
                        |---modules
                        |---plugins
                        |---views
                        |---Bootstrap.php
                        |---Service.php
                  |---conf
                        |---app.php
                        |---application.ini
                        |---config.php



## 样例演示

以[http://192.168.8.234:7070/user/index/get](http://192.168.8.234:7070/user/index/get)为请求对象

### 1、Post/Get请求

```php
<?php
//get请求
$url = "http://192.168.8.234:7070/user/index/get?uid=120";
$response = file_get_contents($url);
echo $response."<br>\n";

//post请求
$url = "http://192.168.8.234:7070/user/index/get";
$postArr = array('uid'=>200);
$response = curl_by_post($url,$postArr);
echo $response."<br>\n";

function curl_by_post($url,$post) {
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
    $result=curl_exec($ch);
    curl_close($ch);
    return $result;
}
```