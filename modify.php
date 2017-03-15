<?php require_once('_config/web_config.php'); ?>
<?php require_once('connections/Conn_PDO.php'); ?>
<?php require_once('include/DW_User_Authentication.inc.php'); ?>
<?php include_once('include/myFunction.inc.php'); ?>
<?php
if ( isset($_POST['Mobile']) && !empty($_POST['Mobile']) && isset($_POST['Email']) && !empty($_POST['Email']) )
{
   $varUsername = $_SESSION['HCW_Username'];
   $varMobile = trim($_POST['Mobile']);
   $varEmail = trim($_POST['Email']);

   $sql_N005_rsMember = "Update member SET Mobile = ?, Email = ? WHERE Username = ? ";
   $rsMember = $conn1->prepare($sql_N005_rsMember);
   $rsMember->bindParam(1, $varMobile, PDO::PARAM_STR);
   $rsMember->bindParam(2, $varEmail, PDO::PARAM_STR);
   $rsMember->bindParam(3, $varUsername, PDO::PARAM_STR);
   $rsMember->execute();
   $totalRows_rsMember = $rsMember->rowCount();

   // echo $varItemName."/".$totalRows_rsTitle."/".$totalRows_rsTimeOverlap; //deubg用
   echo $totalRows_rsMember;
} else {
   echo "Error! (-60)";
}

?>
