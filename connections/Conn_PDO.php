<?php
// PDO連線測試
$dbmstype = "mysql";
$hostname = "127.0.0.1";
$database = "vote";
$username = "example";
$password = "example";
$dsn = $dbmstype.":host=".$hostname.";dbname=".$database; // Data Source Name

$init_command = "SET NAMES utf8";
$conn1 = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => $init_command));

?>
