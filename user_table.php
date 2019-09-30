<?php
include('connectstring.php');
$stmt=$dbh->query("select * from user_table");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
          print_r($row);
}
?>
