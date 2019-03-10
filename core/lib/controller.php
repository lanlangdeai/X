<?php  
namespace core\lib;

/**
 * 控制器基类
 */
class controller 
{
	public $data = [];

	// 分配变量
	protected function assign($name,$value)
	{	
		$this->data[$name] = $value;
	}

	// 渲染模板
	protected function display($file)
	{
		$file = APP.'view/'.$file;
		if(is_file($file) ){
			extract($this->data);
			include $file;
		}else{
			// 不存在,报错
			throw new \Exception("View File Not Exist ".$file);
		}
	}
}