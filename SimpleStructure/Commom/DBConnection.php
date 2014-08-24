<?php
/* 
	@file    DBConnection.php
	@version 1.01
	@brief   功能 : 建立資料庫連線控制
	@author  Eastmoon
	@date    2014.08.25 
	@functional : 
		Connect		- 連接資料庫
		Close		- 關閉連線
		GetConnect	- 取回連線物件
		GetStatus	- 取回連線狀態編號
*/
class DBConnection{
	// @parame $m_dbInfo - 資料庫連接參數, default "" 
    // @parame $m_dbConn - 資料庫連接實體, default array();
	// @parame $m_status - 資料庫連線狀態編號
	private $m_dbConn = ""; 
	private $m_dbInfo = array();
	private $m_status = "";

	// 建構式
	// 物件建立時設定連接參數
	public function __construct()
	{ 
		$this->m_dbInfo = array(
			"Database"=>DB_NAME,
			"UID"=>DB_ACCOUNT, 
			"PWD"=>DB_PASSWORD,
			"CharacterSet" => 'utf-8'
		); 
	}
	/*
	資料庫實際連線, 並判斷是否連線正常
	@parame $dbError - 儲存資料庫連結錯誤陣列資料,以供判斷錯誤類型, default array(); 	
	@parame $status - 儲存判斷完的錯誤資料, default array();
	*/
	public function Connect()
	{
		//連接資料庫
		$this->m_dbConn = sqlsrv_connect( DB_SERVER, $this->m_dbInfo ); 

		//連接成功,將連線回傳
		if( $this->m_dbConn ) 
		{
			$this->m_status = "00000";
			return true;
		}
		else
		{
			//連線失敗, 判斷失敗原因
			$dbError = sqlsrv_errors();
			//資料庫伺服器連線失敗
			if($dbError[0][0]=="08001") 
				$this->m_status = "10101";
			else
			{
				switch( $dbError[1][0] )
				{
					//資料庫不存在
					case "42000" :
						$this->m_status = "10102";
					break;
					//連線帳號密碼錯誤
					case "28000" :
						$this->m_status = "10103";
					break;	
					//其它情況視為資料庫伺服器連線失敗	
					default :
						$this->m_status = "10101";
					break;
				}
			}
		}
		return false;
	} 

	//關閉連線
	public function Close()
	{
		sqlsrv_close($this->m_dbConn);
		$this->m_dbConn = "";
	}

	//取回連線
	public function GetConnect()
	{
		return $this->m_dbConn;
	}

	//取回狀態
	public function GetStatus()
	{
		return $this->m_status;
	}
}
?>