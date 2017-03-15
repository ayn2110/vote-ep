<?php require_once(WEB_ROOT.'/'.'_config/web_config.php'); ?>
<?php require_once(WEB_ROOT.'/'.'connections/Conn_PDO.php'); ?>
<?php
   $varCounterTarget = 'Homepage';

   $sql_H002_udCounter = "UPDATE counters SET Hits = Hits +1 WHERE CounterName = ? ";
   $udCounter = $conn1->prepare($sql_H002_udCounter);
   $udCounter->bindParam(1, $varCounterTarget, PDO::PARAM_STR);
   $udCounter->execute();

   $sql_N003_rsCounter = "SELECT Hits FROM counters WHERE CounterName = ? ";
   $rsCounter = $conn1->prepare($sql_N003_rsCounter);
   $rsCounter->bindParam(1, $varCounterTarget, PDO::PARAM_STR);
   $rsCounter->execute();
   $row_rsCounter = $rsCounter->fetch(PDO::FETCH_ASSOC);
   $totalRows_rsCounter = $rsCounter->rowCount();

   if ( $_SERVER['server_addr'] == LOCAL_IP || $_SERVER['remote_addr'] == LOCAL_IP )
      echo $row_rsCounter['Hits'];
?>
