<?php 
namespace app\controller;

use \core\lib\model as Model;
use \core\lib\controller;
use \core\lib\config;

class Index extends controller
{
	function __construct()
	{

	}

	public function index()
	{
		// $model = new Model(); 
		// $res = $model->query('select * from user');
		// // p($res->fetchAll());
		// $this->assign('name','xing');
		// $this->display('index.html');	
		echo config::get('name','app');
		echo config::get('age','app');
	}
}