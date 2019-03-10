<?php  
namespace core\lib;

/**
 * model基类
 */
class model extends \PDO
{
	function __construct()
	{
		// 待优化(全局配置)
		$user = 'root';
		$pwd = 'root';
		$host = '127.0.0.1';
		$port = '3306';
		$db = 'test';
		$charset = 'utf8';
		$dsn = 'mysql:host='.$host.';port='.$port.';dbname='.$db;
		
		try {
			parent::__construct($dsn,$user,$pwd);
		} catch (\PDOException $e) {
			p($e->getMessage());die;
		}
	}
}