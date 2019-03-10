<?php  
namespace core\lib;

/**
 * 配置类
 */
class config
{
	public static $configs = [];

	// 获取配置
	public function get($name,$file)
	{
		if(isset(self::$configs[$file]) ){
			if(isset(self::$configs[$file][$name]) ){
				return self::$configs[$file][$name];
			}else{
				throw new \Exception("配置项不存在".$name);
			}
		}else{
			$filePath = X.'conf/'.$file.EXT;
			if(is_file($filePath) ){
				self::$configs[$file] = include $filePath;
				if(isset(self::$configs[$file][$name]) ){
					return self::$configs[$file][$name];
				}else{
					throw new \Exception("配置项不存在".$name);
				}
			}else{
				throw new Exception("配置文件不存在".$filePath);
			}
		}
	}

	// 设置配置
	public function set($name,$value,$file)
	{

	}
}