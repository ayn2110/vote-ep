<?php require_once('_config/web_config.php'); ?>
<?php require_once('connections/Conn_PDO.php'); ?>
<?php require_once('include/DW_User_Authentication.inc.php'); ?>
<?php include_once('include/myFunction.inc.php'); ?>
<?php
if ( isset($_POST['Title']) && !empty($_POST['Title']) )
{

   $varItemName = trim($_POST['Title']);
   $varUsername = $_SESSION['HCW_Username'];

   //是否一樣的名稱
   $sql_N001_rsTitle = "SELECT ItemName FROM item WHERE ItemName = ? ";
   $rsTitle = $conn1->prepare($sql_N001_rsTitle);
   $rsTitle->bindParam(1, $varItemName, PDO::PARAM_STR);
   $rsTitle->execute();
   $row_rsTitle = $rsTitle->fetch(PDO::FETCH_ASSOC);
   $totalRows_rsTitle = $rsTitle->rowCount();

   //使用者已命名次數
   $sql_N007_rsItems = "SELECT ItemIndex FROM item WHERE Username = ? ";
   $rsItems = $conn1->prepare($sql_N007_rsItems);
   $rsItems->bindParam(1, $varUsername, PDO::PARAM_STR);
   $rsItems->execute();
   $row_rsItems = $rsItems->fetch(PDO::FETCH_ASSOC);
   $totalRows_rsItems = $rsItems->rowCount();

   // $varType = 'Hour';
   $varType = 'Minute';
   $varUsername = $_SESSION['HCW_Username'];
   $varTime = 720;

   //$sql_N002_rsTimeOverlap = "SELECT ItemIndex, ItemName, MemberIndex, Username, TIMESTAMPDIFF(:qType, CreateDateTime, NOW()) AS Difference FROM item WHERE Username = :qUsername AND TIMESTAMPDIFF(:qType, CreateDateTime, NOW()) <= :qTime ";
   $sql_N002_rsTimeOverlap = "SELECT ItemIndex, ItemName, MemberIndex, Username, TIMESTAMPDIFF(Minute, CreateDateTime, NOW()) AS Difference FROM item WHERE Username = :qUsername AND TIMESTAMPDIFF(Minute, CreateDateTime, NOW()) <= :qTime ";
   $rsTimeOverlap = $conn1->prepare($sql_N002_rsTimeOverlap);
   // $rsTimeOverlap->bindParam(':qType', $varType, PDO::PARAM_STR);
   $rsTimeOverlap->bindParam(':qUsername', $varUsername, PDO::PARAM_STR);
   $rsTimeOverlap->bindParam(':qTime', $varTime, PDO::FETCH_NUM);
   $rsTimeOverlap->execute();
   $row_rsTimeOverlap = $rsTimeOverlap->fetch(PDO::FETCH_ASSOC);
   $totalRows_rsTimeOverlap = $rsTimeOverlap->rowCount();

   $varTimeLeft = $varTime - $row_rsTimeOverlap['Difference'];

   // echo $varItemName."/".$totalRows_rsTitle."/".$totalRows_rsTimeOverlap; //deubg用

   if ( $totalRows_rsTitle > 0 ) {
   echo "同樣的或極度相似的名稱已存在, 請重新取一個新的名稱.";
   } else if ( $totalRows_rsItems >= 2 ) {
      echo "依據活動辦法，每人至多只能為平台取二個新名稱，你無法再進行新的命名。\r\n你目前已命名 $totalRows_rsItems 個名稱。";
   } else if ( $totalRows_rsTimeOverlap > 0 && $varType == 'Hour' ) {
      echo "你在 $varTime 小時內已經命名過，如果要命名一個新名稱時，請稍後 $varTimeLeft 小時。你已命名 $totalRows_rsItems 個名稱。";
   } else if ( $totalRows_rsTimeOverlap > 0 && $varType == 'Minute' ) {
      echo "你在 $varTime 分鐘內已經命名過，如果要命名一個新名稱時，請稍後 $varTimeLeft 分鐘。你已命名 $totalRows_rsItems 個名稱。";
   } else {
      // 新增名命
      $sql_N003_insNewName = "INSERT INTO item ( ItemName, EventIndex, MemberIndex, Username, CreateDateTime ) VALUES ( :qTitle, 1, NULL, :qUsername, NOW() ) ";
      $insNewName = $conn1->prepare($sql_N003_insNewName);
      $insNewName->bindParam(':qTitle', $varItemName, PDO::PARAM_STR);
      $insNewName->bindParam(':qUsername', $varUsername, PDO::PARAM_STR);
      $insNewName->execute();
      $totalRows_insNewName = $insNewName->rowCount();
      // echo "新的名稱已命名成功.($totalRows_insNewName)";
      if ( $totalRows_insNewName == 1 )
         echo $totalRows_insNewName;
      else {
         echo "命名失敗, 請稍後再試.";
      }
   }
} else {
   echo "Error! (-10)";
}

?>
