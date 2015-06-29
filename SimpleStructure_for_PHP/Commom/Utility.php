<?php
/* 
	@file    Utility.php
	@version 1.02
	@brief   功能 : 通用function 建立於此
	@author  Eastmoon
	@date    2014.08.25
	@functional : 
		SystemGetUserIP() - 取得使用者真實IP
		SystemOutputFormat() - API 輸出格式
*/

/*
	回傳使用者真實IP
	@return $ip 當前連線使用者IP，default ""
*/
function SystemGetUserIP()
{ 
	$ip=""; 
	if(!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		//先判斷是否為代理伺服器連線,是的話取得HTTP_CLIENT_IP
		$ip = $_SERVER['HTTP_CLIENT_IP'];
    }
	else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		//判斷是否經過多個代理伺服器經由多個IP
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
	else
	{
		//一般狀態的IP取得
		$ip= $_SERVER['REMOTE_ADDR'];
    }
	return $ip;
}

/*
	API 輸出格式
	@return $output
*/
function SystemOutputFormat( $_code, $_msg, $_data )
{
	return array(
		"code" => $_code,
		"msg" => $_msg,
		"data" => $_data
		);
}
?>