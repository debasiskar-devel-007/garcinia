<?php

// change the following paths if necessary



// remove the following lines when in production mode
defined('YII_MODE') or define('YII_MODE',false);
defined('YII_DEBUG') or define('YII_DEBUG',true);
if(YII_DEBUG)
{

    //$yii='../yii/framework/yii.php';
}
else
{

    //$yii='yii/framework/yii.php';
}
if(YII_MODE)
{

    $yii='yii/framework/yii.php';
    $config=dirname(__FILE__).'/protected/config/main-server.php';


}
else
{
    $yii='../yii/framework/yii.php';
    $config=dirname(__FILE__).'/protected/config/main.php';
}
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);

Yii::createWebApplication($config)->run();

