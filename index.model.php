<?php require_once('connections/Conn_PDO.php'); ?>
<?php
// $sql_H001_rsItem = "SELECT i.ItemIndex, ItemName, CreateDateTime, Username, PersonName, (CASE isnull(Counter) WHEN 1 THEN 0 ELSE Counter END) AS Counter, ( SELECT COUNT(*) FROM vote ) AS CountTotal FROM ( SELECT ItemIndex,ItemName, MemberIndex, CreateDateTime FROM item WHERE ( EventIndex = 1 OR EventIndex is NULL ) ) AS i LEFT JOIN ( SELECT MemberIndex, Username, PersonName FROM member ) AS m ON m.MemberIndex = i.MemberIndex LEFT JOIN ( SELECT ItemIndex, COUNT(*) AS Counter FROM vote GROUP BY ItemIndex ) AS v ON v.ItemIndex = i.ItemIndex ORDER BY Counter DESC";
// $sql_H001_rsItem = "SELECT i.ItemIndex, ItemName, CreateDateTime, DATE_FORMAT(CreateDateTime,'%Y-%m-%d %H:%i') AS ShortDateTime, Username, PersonName, (CASE isnull(Counter) WHEN 1 THEN 0 ELSE Counter END) AS Counter, ( SELECT COUNT(*) FROM vote ) AS CountTotal FROM ( SELECT ItemIndex,ItemName, MemberIndex, CreateDateTime FROM item WHERE ( EventIndex = 1 OR EventIndex is NULL ) ) AS i LEFT JOIN ( SELECT MemberIndex, Username, PersonName FROM member ) AS m ON m.MemberIndex = i.MemberIndex LEFT JOIN ( SELECT ItemIndex, COUNT(*) AS Counter FROM vote GROUP BY ItemIndex ) AS v ON v.ItemIndex = i.ItemIndex ORDER BY Counter DESC ";
$sql_H001_rsItem = "SELECT i.ItemIndex, ItemName, CreateDateTime, DATE_FORMAT(CreateDateTime,'%Y-%m-%d %H:%i') AS ShortDateTime, m.Username, PersonName, (CASE isnull(Counter) WHEN 1 THEN 0 ELSE Counter END) AS Counter, ( SELECT COUNT(*) FROM vote AS v, item AS i WHERE ( i.EventIndex = 1 ) AND v.ItemIndex = i.ItemIndex ) AS Total FROM ( SELECT ItemIndex, ItemName, Username, CreateDateTime FROM item WHERE ( EventIndex = 1 OR EventIndex is NULL ) ) AS i LEFT JOIN ( SELECT MemberIndex, Username, PersonName FROM member ) AS m ON m.Username = i.Username LEFT JOIN ( SELECT ItemIndex, COUNT(*) AS Counter FROM vote WHERE ItemIndex <> 99999 GROUP BY ItemIndex ) AS v ON v.ItemIndex = i.ItemIndex ORDER BY Counter DESC ";
$rsItem = $conn1->prepare($sql_H001_rsItem);
$rsItem->execute();
$row_rsItem = $rsItem->fetch(PDO::FETCH_ASSOC);
$totalRows_rsItem = $rsItem->rowCount();

$sql_N005_rsWhoAmI = "SELECT MemberIndex, Username, Mobile, Email FROM member WHERE Username = ? ";
$rsWhoAmI = $conn1->prepare($sql_N005_rsWhoAmI);
$rsWhoAmI->bindParam(1, $_SESSION['HCW_Username'], PDO::PARAM_STR);
$rsWhoAmI->execute();
$row_rsWhoAmI = $rsWhoAmI->fetch(PDO::FETCH_ASSOC);
$totalRows_rsWhoAmI = $rsWhoAmI->rowCount();

$varMobileX = $row_rsWhoAmI['Mobile'];
$varEmailX = $row_rsWhoAmI['Email'];
?>
