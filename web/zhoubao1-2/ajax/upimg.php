<?php 
define('IN_QY',true);
//require("../include/common.inc.php");

	if(is_uploaded_file($_FILES['uploadImg']['tmp_name'])){
		$uploadImg=$_FILES["uploadImg"];
		//获取数组里面的值
		//$name=time().$qrcode["name"];//上传文件的文件名
		$imgd = strrev($_FILES['uploadImg']['name']);
		$ewarray = explode('.',$imgd);
		$ewtype=$uploadImg["type"];//上传文件的类型
		$ewsize=$uploadImg["size"];//上传文件的大小
		$imgdtmp=$uploadImg["tmp_name"];//上传文件的临时存放路径
		$img = 'upload/'.time().rand(800,1000).'m.'.strrev($ewarray[0]);
		//判断是否为图片
		switch ($ewtype){
			case 'image/pjpeg':$okTypew=true;
				break;
			case 'image/jpeg':$okTypew=true;
				break;
			case 'image/gif':$okTypew=true;
				break;
			case 'image/png':$okTypew=true;
				break;
		}

		if($okTypew){
			$error=$uploadImg["error"];//上传后系统返回的值
			//把上传的临时文件移动到up目录下面
			move_uploaded_file($imgdtmp,$img);
		}else{
			qy_alert_back('no');
		}
	}



 $list=array("pic"=>$img); 
 echo json_encode($list); 








?>