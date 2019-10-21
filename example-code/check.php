<?php
include '../connectstring.php';
date_default_timezone_set("Asia/Bangkok");
print "current_date".$current_date=date("Y-m-d H:i:s");
$query="INSERT into check_date_time(current_date) VALUES (:current_date)";
$stmt1=$dbh->prepare($query);
$stmt1->bindParam(':current_date',$current_date);
$stmt1->execute();
print "<hr>";
$query2="SELECT * from check_date_time order by current_date ASC";
$stmt2=$dbh->query($query2);
$stmt2->execute();
while($row=$stmt2->fetch(PDO::FETCH_ASSOC)){
    print $row['current_date'];
    print "<br>";
}
print "file ok";

?>
