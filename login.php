<?php require_once('_config/web_config.php'); ?>
<?php include_once('connections/Conn_PDO.php'); ?>
<?php //include_once('connections/Conn_SQLSRV.php'); ?>
<?php
if (!isset($_SESSION)) {
   session_start();
}

if ( isset($_POST['Username']) && !empty($_POST['Username']) && isset($_POST['Password']) && !empty($_POST['Password']) && date("Y-m-d H:i") >= '2016-01-04 12:00' && date("Y-m-d H:i") <= '2016-02-22 00:00' )
{

   $varUsername = $_POST['Username'];
   $varPassword = $_POST['Password'];

   $sql_M001_rsMember = "SELECT Username, `Password`, PersonName FROM member WHERE Username = ? AND `Password` = ? ";
   $rsMember = $conn1->prepare($sql_M001_rsMember);
   $rsMember->bindParam(1, $varUsername, PDO::PARAM_STR);
   $rsMember->bindParam(2, $varPassword, PDO::PARAM_STR);
   $rsMember->execute();
   $row_rsMember = $rsMember->fetch(PDO::FETCH_ASSOC);
   $totalRows_rsMember = $rsMember->rowCount();

   if ( $totalRows_rsMember > 0 ) {
      $_SESSION['HCW_Username'] = $row_rsMember['Username'];
      $_SESSION['HCW_UserGroup'] = 'mem';
   }

   // echo $totalRows_rsMember."/".$varUsername."/".$varPassword; //deubg用
   // echo $totalRows_rsMember; //deubg用
   //*
   include_once('include/signin_ip.php');
   if ( $totalRows_rsMember > 0 ) {
      echo $totalRows_rsMember;
   }
   else
      echo "帳號或密碼輸入錯誤, 請確認後重新輸入.";
   //*/

} else if ( isset($_POST['Username']) && empty($_POST['Username']) && isset($_POST['Password']) && empty($_POST['Password']) ) {
   echo "請輸入帳號及密碼";
} else if ( isset($_POST['Username']) && empty($_POST['Username']) ) {
   echo "請輸入帳號";
} else if ( isset($_POST['Password']) && empty($_POST['Password']) ) {
   echo "請輸入密碼";
} else {
   if ( date("Y-m-d H:i") >= '2016-02-22 00:00' ) {
      echo "本階段活動已結束，目前暫停登入。";
   } else  {
      echo "Error! (-1)";
   }
}

?>
