<?php  
namespace core;

class app
{
	public static $classMap = [];

	public static function run()
	{
		$route = new \core\lib\route();
		$controller = $route->controller;
		$action = $route->action;
		// 文件是否存在
		$controllerFile = APP.'controller'.DS.$controller.EXT;
		$controllerClass = '\\'.'app'.'\controller\\'.$controller;
		if(is_file($controllerFile) ){
			include $controllerFile;
			$instance = new $controllerClass();
			$instance->$action();
		}else{
			throw new \Exception("Not Found Controller".$controllerClass);
		}
	}

	public static function load($class)
	{
		$class = str_replace('\\','/',$class);

		if(isset(self::$classMap[$class]) ){
			return true;
		}else{
			$file = X.$class.EXT; 
			if(is_file($file) ){
				include $file;
				self::$classMap[$class] = $class;
				return true;
			}
			return false;
		}
	}
}