<?php require_once('_config/web_config.php'); ?>
<?php require_once('connections/Conn_PDO.php'); ?>
<?php require_once('include/DW_User_Authentication.inc.php'); ?>
<?php include_once('include/myFunction.inc.php'); ?>
<?php
if ( isset($_POST['VoteNumber']) && $_POST['VoteNumber'] > 1 )
{
   $varVoteNumber = $_POST['VoteNumber'];
   $varUsername = $_SESSION['HCW_Username'];
   $varInterval = 60 * 12;
   $varTimeLeft = 0;

   // echo "VoteNumber:".$varVoteNumber.",";

   // 檢查時限內是否已投過票
   if ( $varVoteNumber != 99999 )
   {
      $sql_N006_rsVoteInterval = "SELECT VoteIndex, Username, ItemIndex, VoteDateTime ,TIMESTAMPDIFF(Minute, VoteDateTime, NOW()) AS Difference FROM vote WHERE Username = :qUsername AND TIMESTAMPDIFF(Minute, VoteDateTime, NOW()) < :qInterval ORDER BY Difference DESC ";
      $rsVoteInterval = $conn1->prepare($sql_N006_rsVoteInterval);
      $rsVoteInterval->bindParam(':qUsername', $varUsername, PDO::PARAM_STR);
      $rsVoteInterval->bindParam(':qInterval', $varInterval, PDO::FETCH_NUM);
      $rsVoteInterval->execute();
      $row_rsVoteInterval = $rsVoteInterval->fetch(PDO::FETCH_ASSOC);
      $totalRows_rsVoteInterval = $rsVoteInterval->rowCount();

      $varTimeLeft = $varInterval - $row_rsVoteInterval['Difference'];
   }

   // echo "totalRows_rsVoteInterval:".$totalRows_rsVoteInterval."/TimeLeft:".$varTimeLeft;

   if ( $totalRows_rsVoteInterval > 0 && $varTimeLeft > 0 && $varVoteNumber != 99999 ) {
      echo "你在 $varInterval 分鐘內曾經投票過，距離下次投票剩 $varTimeLeft 分鐘。";
   } else {
      // 新增投票
      $sql_N003_insNewName = "INSERT INTO vote ( MemberIndex, Username, ItemIndex, VoteDateTime ) VALUES ( NULL, :qUsername, :qVoteNumber, NOW() ) ";
      $insNewName = $conn1->prepare($sql_N003_insNewName);
      $insNewName->bindParam(':qVoteNumber', $varVoteNumber, PDO::FETCH_NUM);
      $insNewName->bindParam(':qUsername', $varUsername, PDO::PARAM_STR);
      $insNewName->execute();
      $totalRows_insNewName = $insNewName->rowCount();

      // echo "/[99999]+".$totalRows_insNewName;
   }
} else {
   echo "Error! (-20)";
}

?>
