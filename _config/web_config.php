<?php
/*
* Site Config File (s_config/web_config)
* 引用語法: require_once($_SERVER['DOCUMENT_ROOT'].'/_config/web_config.php');
*/

//URL參數保護用 MD5 Pattern
#define('MD5_HASH_PATTERN', "#ncut-borrow-by-hcw#");

/*
* 網站常數設定(用於 echo )
*/
define('WEB_NAME', "e-Portfolio平台創意命名暨線上投票平台");	//網站名稱，用於 <title> 及 JavaScript 內
//define('GOOGLE_PAGETRACKER', "UA-xxxxxx-1");	//Google Analytics 的帳號的名稱，用於 echo 指令

/*
* 網站參數設定
*/
define('TIME_ZONE', "Asia/Taipei");		//指定時區
date_default_timezone_set(TIME_ZONE);	//使用PHP函式指定系統的時差
define('BASE_FOLDER', "/vote");		//子資料名稱，不含後綴"/"
define('WEB_ROOT', $_SERVER['DOCUMENT_ROOT'].BASE_FOLDER);	//字尾不含"/"
define('WEB_URL', $_SERVER['HTTP_HOST'].BASE_FOLDER);	//網站 URL ROOT 路徑，用於引用 .js 或 .css 之用，字尾不含"\"

define('SYSTEM_MAINTAIN', false);		//手動指定系統是否處於維護狀態中

define('ADMIN_IP', "140.128.74.79");	//系統管理者的IP位置，除錯(Debug)用。
// define('DEBUG_IP', "140.128.74.79");	//偵錯用(或測試用)的IP位置，除錯(Debug)用。
define('DEBUG_IP', "127.0.0.1");	//偵錯用(或測試用)的IP位置，除錯(Debug)用。
define('ENCRYPTION_LOGIN', false);		//系統是否使用編碼登入(如:MD5)

/*
* 啟動偵錯(Debug)模式
*/
if ( getenv("remote_addr") == DEBUG_IP ) {
	error_reporting(E_ALL ^ E_NOTICE);
	ini_set('display_errors', '1');
}

/*
* 網站參數設定(線上預約系統)
*/
// define('UNDERTAKE_UNIT', '教學資源中心');		//承辦與管理單位
# define('PASSCODE_LENGTH', 8);		//通行碼長度


?>
