<?php
	/* 
		@file    api.php
		@version 1.0
		@brief   應用程式介面格式解析與回傳 
		@author  Eastmoon
		@date    2014.08.24
		@param
			- fun：應用程式功能
			- param：功能輸入參數
	*/
	//載入通用設定值
	require_once "config.php"; 
	//載入輸出編碼
	require_once "apicode.php";  
	//載入資料庫連結Class
	require_once "Commom/DBConnection.php"; 
	//載入通用功能 
	require_once "Commom/Utility.php";  

	// 儲存回傳資料(提供轉換為JSON格式)
	$result = array();  
	
	// 當POST參數未給時，補設為空值方便後續統一判斷並減少 Warning Log
	if(!isset($_POST["fun"])) 
		$_POST["fun"] = ""; 

	// 分割fun請求，搜索正確的物件
	// preg_split online : https://www.functions-online.com/preg_split.html
	// Regular Expression ref : http://www.freeformatter.com/regex-tester.html
	// Regular Expression ref : http://atedev.wordpress.com/2007/11/23/%E6%AD%A3%E8%A6%8F%E8%A1%A8%E7%A4%BA%E5%BC%8F-regular-expression/
	$functionList = preg_split("/\./",$_POST["fun"]); 
	
	// 取得路徑與物件
	$maxCount = count( $functionList );
	
	$classPath = "";
	$className = "";
	if( $maxCount > 0 )
	{
		for( $i = 0 ; $i < $maxCount ; $i++ )
		{
			if( $i == 0 )
				$classPath = $functionList[$i];
			else
				$classPath .= ("/" . $functionList[$i]);

			if( $i == ($maxCount - 1) )
			{
				//指定副檔名
				$classPath .= ".php";
				//最後一欄則為物件名稱
				$className = $functionList[$i];
			}
		}
	}
	//echo "Path : " . $classPath . "<br />";
	//echo "Class : " . $className . "<br />";
	
	// 取得物件需求參數，參數列需扣除功能名稱(fun)
	$param = array();
	$keys = array_keys($_POST);
	foreach( $keys as $key )
	{
		if( $key != "fun" )
			$param[$key] = $_POST[$key];
	}
	//var_dump( $param );
	//echo "<br />";

	// 建立連線物件

	// 若存有連線，建立物件
	$dbConn = new DBConnection();
	if( $dbConn->Connect() ) 
	{
		// 若檔案存在，引入檔案
		if( file_exists( $classPath ) ) 
		{
			include( $classPath );

			// 若存有物件，宣告物件並執行
			if( class_exists($className, false) )
			{
				$obj = new $className( $dbConn->GetConnect() );
				$result = $obj->Execute( $param );
			}
			else
			{
				$result = SystemOutputFormat( "10002", $APICODE["10002"] );
			}
		} 
		else 
		{
			$result = SystemOutputFormat( "10001", $APICODE["10001"] );
		}
	}
	else
	{
		$result = SystemOutputFormat( $dbConn->GetStatus(), $APICODE[$dbConn->GetStatus()] );
	}

	//close the connection
	$dbConn->Close();
	
	// output json
	echo json_encode( $result );
?>