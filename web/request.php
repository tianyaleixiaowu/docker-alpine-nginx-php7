<?php 
/*$port = 3306;         //刚才输入的本地将要使用的端口
$userName = 'md';        //在服务器B上连接服务器Amysql，使用的mysql用户名
$passwd = 'maida6868';        //改用户名对应的密码
$con = new PDO("mysql:host=172.26.249.246:{$port}", $userName, $passwd);
if($con){
echo "success";die;
}*/
include 'database.class.php';
include 'test.class.php';
$mydabase=new linkMysql("127.0.0.1","md","maida6868","zhoubao");

$sql = "SELECT access_token,expire_time_access_token,jsapi_ticket,expire_time_jsapi_ticket FROM cache";
$result = $mydabase->mysql_query_rest($sql); 
print_r($result);

$test = new Test();
$aa = $test->index();
print_r($aa);
?>