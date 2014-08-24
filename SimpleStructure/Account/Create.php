<?php
class Create{ 
	// @parame dbConn 整個Class一起使用的資料庫連線
	// @parame request 整個Class一起使用的回傳值
	private $m_dbConn = "";
	private $m_request = array();

	// 建構式
	public function __construct( $_dbConn )
	{
		$this->m_dbConn = $_dbConn;
	}

	// 解構式
	public function __destruct()
	{

	}
	
	// 執行命令
	function Execute( $_param )
	{
		// 解析命令
		return SystemOutputFormat( "00000", $GLOBALS["APICODE"]["00000"], $_param );
	}
}
?>