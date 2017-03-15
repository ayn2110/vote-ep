<?php require_once('connections/Conn_PDO.php'); ?>
<?php
/*
if (!isset($_SESSION)) {
  session_start();
}

// 單一簽入程式
if ( $_SESSION['Login_From_SSO'] == true )
{
	$_POST['Username'] = $_SESSION['SSO_Username'];
	$_POST['Password'] = $_SESSION['SSO_Password'];
}
//*/

//定議變數

?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['Username'])) {
  $loginUsername=$_POST['Username'];
  $password=$_POST['Password'];
  $MM_fldUserAuthorization = "Level";
  $MM_redirectLoginSuccess = "member/index.php";
  $MM_redirectLoginFailed = "signin.php?s=failed&u=$loginUsername";
  $MM_redirecttoReferrer = false;


   //讀取使用者帳號密碼
   $sql_rsMember = "SELECT MemberIndex, Username, `Password`, Level FROM member WHERE Username =? AND `Password` = ? ";
   // $sql_rsMember = "SELECT MemberIndex, Username, `status`, Level FROM member WHERE Username = ? AND `status` = ? "; //deubg用
   $rsMember = $conn1->prepare($sql_rsMember);
   $rsMember->bindParam(1, $loginUsername, PDO::PARAM_STR);
   $rsMember->bindParam(2, $password, PDO::PARAM_STR);
   $rsMember->execute();
   $row_rsMember = $rsMember->fetch(PDO::FETCH_ASSOC);
   $loginFoundUser = $rsMember->rowCount();

  if ($loginFoundUser) {

   //  $loginStrGroup  = mysql_result($LoginRS,0,'Level');
    $loginStrGroup  = $row_rsMember['Level'];
    $loginIntIndex  = $row_rsMember['MemberIndex'];

	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['HCW_Username'] = $loginUsername;
    $_SESSION['HCW_UserGroup'] = $loginStrGroup;
    $_SESSION['HCW_UserIndex'] = $loginIntIndex;

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
    }
	 include('signin_ip.php'); //寫入登入狀態及IP，尚未最佳化。
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    include('signin_ip.php'); //寫入登入狀態及IP，尚未最佳化。
	//  include('sign_in_ip_failed.php'); //寫入登入狀態及IP，尚未最佳化。
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
