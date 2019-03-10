<?php  
namespace core\lib;

/**
 * 路由类
 */
class route
{
	public $controller,$action;

	function __construct()
	{
		$this->parseUrlPath();
	}

	public function parseUrlPath()
	{
		// 待优化(解析路由: 1)/index/index/name/xing/age/23 2)/index/index?name=xing&age=23)
		if($_SERVER['REQUEST_URI'] == '/'){
			$this->controller = config::get('default_controller','app');
			$this->action = config::get('default_action','app');
		}else{
			$pathArr = explode('/',trim($_SERVER['REQUEST_URI'],'/') );
			$this->controller = isset($pathArr[0]) ? array_shift($pathArr) : config::get('default_controller','app');
			$this->action = isset($pathArr[0]) ? ucfirst(array_shift($pathArr)) : config::get('default_action','app');

			$count = count($pathArr);

			$i = 0;
			while ($i < $count) {
				if(isset($pathArr[$i+1]) ){
					$_GET[$pathArr[$i]] = $pathArr[$i+1];
				}
				$i += 2;
			}
		}
	}
}