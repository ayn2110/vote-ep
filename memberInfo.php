<?php require_once('_config/web_config.php'); ?>
<?php require_once('connections/Conn_PDO.php'); ?>
<?php require_once('include/DW_User_Authentication.inc.php'); ?>
<?php include_once('include/myFunction.inc.php'); ?>
<?php
if ( isset($_POST['name']) && !empty($_POST['name']) )
{
   $varUsername = $_SESSION['HCW_Username'];

   $sql_N005_rsMember = "SELECT MemberIndex, Username, Mobile, Email FROM member WHERE Username = ? ";
   $rsMember = $conn1->prepare($sql_N005_rsMember);
   $rsMember->bindParam(1, $varUsername, PDO::PARAM_STR);
   $rsMember->execute();
   $row_rsMember = $rsMember->fetch(PDO::FETCH_ASSOC);
   $totalRows_rsMember = $rsMember->rowCount();

   // echo $varItemName."/".$totalRows_rsTitle."/".$totalRows_rsTimeOverlap; //deubg用

   if ( empty($row_rsMember['Mobile']) || empty($row_rsMember['Email']) ) {
      echo 1;
   } else {
      echo 0;
   }
} else {
   echo "Error! (-50)";
}

?>
