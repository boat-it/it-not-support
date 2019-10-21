<?php
include 'connectstring.php';
$current_date=date("Y-m-d H:i:s");
$query="INSERT into chech_date_time($current_date) value (:current_date)";
$stmt=$dbh->prepare($query);
$stmt->bindParam(':current_date',$current_date);
$stmt->execute();
?>
