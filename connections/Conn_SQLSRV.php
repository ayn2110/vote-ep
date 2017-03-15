<?php
/*
程式名稱: SQLSRV 連線
程式說明: PHP 5.4(含) 後的版本捨棄 MSSQL 的連線方式，改用 SQLSRV 的連線方式，本 CLASS 為將相關連線及取得資料的函數進行整理與統合，以方便呼叫使用。
程式作者: 胡哲維(Chewei Hu)
建立日期: 2015/07/08 14:33
程式版本: v1.0.2
更新日期: 2015/11/12 13:18
注意事項: 如果使用的SQL Server資料庫是Big-5格式時，中文欄位請注意轉碼的問題，範例: SELECT id, RTRIM(CAST(name AS nchar)) FROM dbo.member　，中文欄位請先CAST成nchar格式，再做RTRIM。
*/

class connSQLSRV
{
	private $hostname = "192.168.0.2";
	private $database = "example";
	private $username = "example";
	private $password = "example";

	private $charset  = "UTF-8";

	public $conn;						//連線Session
	public $result;					//查詢的資料集(Query Recordset)
	public $row;						//目前取得的資料Record
	public $totalFields;				//總欄數
	public $totalRows;				//總筆數
	public $query;						//欲查詢的SQL語法
	public $parameters = array();	//欲查詢的SQL語法的參數值，形態為 array()

	public function __construct() //建立連線
	{
		// PHP 5.4(含)以上的新連線方式，使用 SQLSRV
		$connectionInfo = array( "Database"=>$this->database, "UID"=>$this->username, "PWD"=>$this->password, "CharacterSet"=>$this->charset);
		$this->conn = sqlsrv_connect( $this->hostname, $connectionInfo);
	}

	public function runQuery( $sql_smt = NULL, $sql_parameters = NULL, $getFirstRecord = true ) //執行查詢
	{
		if ( !isset($sql_smt) )
			$sql_smt = isset($this->query) ? $this->query : "";
		if ( !isset($sql_parameters) )
			$sql_parameters = isset($this->parameters) ? $this->parameters : array();

		if ( isset($sql_smt) && isset($sql_parameters) )
		{
			$this->result = sqlsrv_query( $this->conn, $sql_smt, $sql_parameters, array("Scrollable"=>"buffered") ); //加入array("Scrollable"=>"buffered")才能抓到得totalRows
			$this->totalRows = sqlsrv_num_rows($this->result);
			$this->totalFields = sqlsrv_num_fields($this->result);
			if ( $getFirstRecord ) // 自動讀取第一筆資料
				$this->row = sqlsrv_fetch_array($this->result);
			return true;
		}
		else
		{
			return false; // 執行查詢失敗
		}
	}

	public function getAllRecord() //讀取所有資料
	{
		while ( $this->row = sqlsrv_fetch_array($this->result) )
		{
			for ( $i = 0, $str = ""; $i < $this->totalFields; $i++ )
			{
				if ( $i > 0 ) $str .= ',';
				$str .= $this->row[$i];
			}
			$str .= '<br />';
			echo $str;
		}
	}

	public function getNextRecord() //讀取下一筆資料
	{
		$this->row = sqlsrv_fetch_array($this->result);
		//echo $this->row[0].','.$this->row[1].','.$this->row[2].','.$this->row[3]."<hr />";
	}

	public function freeRecordSet () //釋放查詢的資源(Record Set)
	{
		sqlsrv_free_stmt( $this->result );
	}

	public function closeConnection () //關閉連線
	{
		sqlsrv_close( $this->conn );
	}

	public function debugConnection ( $conn ) //測試MSQL連線狀態
	{
		if ( isset($conn) )
		{
			if ( $conn ) {
				echo "MSSQL Connection Success!!!<hr />";
			} else {
				echo "MSSQL Connection Error!!!<hr />";
				die(print_r(sqlsrv_errors(),true));
			}
		}
		else
		{
			echo "Missing Connection Parameter.<hr />";
		}
	}

	public function test () //Deubg用
	{
		echo "Test Message: ". $this->hostname . "<br />";
	}

	public function end () //釋放資源、關閉連線
	{
		sqlsrv_free_stmt( $this->result );
		sqlsrv_close( $this->conn );
	}
	public function __destruct () //釋放資源、關閉連線
	{
		sqlsrv_free_stmt( $this->result );
		sqlsrv_close( $this->conn );
	}
	// End of Class
}

/*
//呼叫使用範例
if ( getenv('REMOTE_ADDR') == "192.168.0.1" )
{
	header("Content-Type:text/html; charset=utf-8");
	echo "begin<hr>";

	$mssql = new connSQLSRV;

	$mssql->parameters = array();
	//$sql = "Select @@version";
	$mssql->query = 'SELECT divis, RTRIM(CAST(dnm AS nchar)) FROM dbo."u4in1_學制"';

	$mssql->runQuery($mssql->query,$mssql->parameters); // 可簡寫成$mssql->query();
	echo $mssql->totalRows."<br>";

	$mssql->getNextRecord(); // 目前Class會自動取第1筆資料，像DW處理方式一樣。

	unset($mssql);
}
*/
?>
