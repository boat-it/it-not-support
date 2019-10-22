<?php
include '../connectstring.php';
date_default_timezone_set("Asia/Bangkok");
print "create_date".$current_date=date("Y-m-d");
$query="INSERT into check_date_time('current_date') VALUES ($current_date)";
$stmt=$dbh->prepare($query);
$stmt->bindColumn(':current_date',$current_date);
$stmt->execute();
print "<hr>";
$query2="SELECT * from check_date_time order by current_date ASC";
$stmt=$dbh->query($query2);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    print $row['current_date'];
    print "<br>";
}
print "file ok";

?>
