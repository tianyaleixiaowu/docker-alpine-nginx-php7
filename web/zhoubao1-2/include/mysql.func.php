<?php
//error_reporting(0);
if(!defined('IN_QY')){
	exit('Access deniend!');
}
/*function qy_connect(){
	global $conn;
	if(!$conn=@mysql_connect(DB_HOST,DB_USER,DB_PWD)){
		exit('数据库连接失败!');
	}
}
function qy_select_db(){
	if(!mysql_select_db(DB_NAME)){
		exit('找不到指定数据库!');
	}
}
function qy_set_names(){
	if(!mysql_query('SET NAMES UTF8')){
		exit('字符集错误!');
	}
}
function qy_close(){
	if(!mysql_close()){
		exit('数据库关闭异常!');
	}
}*/
global $mysqli;
// 链接数据库
function qy_connect(){	
	@$mysqli = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_NAME);  
	// $user = $mysqli->connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
	if(mysqli_connect_error())  { 
        exit('数据库连接失败!'.mysqli_connect_error());
    }
}

// 设置字符集
function qy_set_names(){
	if($mysqli -> set_charset('utf8')){
		exit('字符集错误!');
	}
}


?>