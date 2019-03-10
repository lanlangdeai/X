<?php  

if(!function_exists('p')){
	function p(){
	    echo '<style>.php-print{background:#eee;padding:10px;border-radius:4px;border:1px solid #ccc;line-height:1.5;white-space:pre-wrap;font-family:Menlo,Monaco,Consolas,"Courier New",monospace;font-size:13px;}</style>', '<pre class="php-print">';

	    $args = func_get_args();

	    if(end($args) === .1){
	        array_splice($args, -1, 1);

	        foreach($args as $k => $v){
	            echo $k>0 ? '<hr>' : '';

	            ob_start();
	            var_dump($v);

	            echo preg_replace('/]=>\s+/', '] => <label>', ob_get_clean());
	        }
	    }else{
	        foreach($args as $k => $v){
	            echo $k>0 ? '<hr>' : '', print_r($v, true);
	        }
	    }
	    echo '</pre>';
	}

}