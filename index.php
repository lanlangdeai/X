<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */

define('EXT','.php');
define('DEBUG',true);
define('DS', DIRECTORY_SEPARATOR);
define('X', realpath(__DIR__).DS);
define('CORE', X.'core'. DS);
define('APP', X.'app' . DS);
define('COMMON',CORE.'common'.DS);

if(DEBUG){
	ini_set('display_error','On');
}else{
	ini_set('display_error','Off');
}

include COMMON.'helper.php';
include CORE.'app.php';

spl_autoload_register('\core\app::load',true,true);

\core\app::run();
