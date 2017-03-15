<?php
//date_default_timezone_set("Asia/Taipei"); //使用PHP函式指定系統的時差

if (!isset($_SESSION)) { session_start(); } //啟動Session

if ( isset($_SESSION['Login_From_SSO']) && $_SESSION['Login_From_SSO'] == true ) $loginStatus = 'SSO'; //由SSO登入

//定義變數
// $varUsername = $_SESSION['HCW_Username'];
$varLevel = 'mem';
$varIP = $_SERVER['REMOTE_ADDR'];

if ( isset($_SESSION['HCW_Username']) && !empty($_SESSION['HCW_Username']) ) { //登入成功
   $varLoginStatus = 'Success'; //登入狀態

   $sql_insLoginInfo = "INSERT INTO login_address (Username, Level, LoginIP, LoginDateTime, LoginStatus) VALUES (:qUsername, :qLevel, :qLoginIP, NOW(), :qLoginStatus) ";
   $insLoginInfo = $conn1->prepare($sql_insLoginInfo);
   $insLoginInfo->bindParam(':qUsername', $varUsername, PDO::PARAM_STR);
   $insLoginInfo->bindParam(':qLevel', $varLevel, PDO::PARAM_STR);
   $insLoginInfo->bindParam(':qLoginIP', $varIP, PDO::PARAM_STR);
   $insLoginInfo->bindParam(':qLoginStatus', $varLoginStatus, PDO::PARAM_STR);
   $insLoginInfo->execute();
} else {
   $varLoginStatus = 'Failed'; //登入失敗
   // $varPassword = $password; //密碼

   $sql_insLoginInfo = "INSERT INTO login_address (Username, Level, LoginIP, LoginDateTime, LoginStatus, FailedPassword) VALUES (:qUsername, :qLevel, :qLoginIP, NOW(), :qLoginStatus, :qFailedPassword) ";
   $insLoginInfo = $conn1->prepare($sql_insLoginInfo);
   $insLoginInfo->bindParam(':qUsername', $varUsername, PDO::PARAM_STR);
   $insLoginInfo->bindParam(':qLevel', $varLevel, PDO::PARAM_STR);
   $insLoginInfo->bindParam(':qLoginIP', $varIP, PDO::PARAM_STR);
   $insLoginInfo->bindParam(':qLoginStatus', $varLoginStatus, PDO::PARAM_STR);
   $insLoginInfo->bindParam(':qFailedPassword', $varPassword, PDO::PARAM_STR);
   $insLoginInfo->execute();
}
?>
