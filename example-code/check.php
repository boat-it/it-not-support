<?php
include 'connectstring.php';
$current_date=date("Y-m-d H:i:s");
$query="INSERT into check_date_time('current_date') value (:current_date)";
$stmt=$dbh->prepare($query);
$stmt->bindParam(':current_date',$current_date);
$stmt->execute();
print "<hr>";
$query2="SELECT * from check_date_time order by current_date ASC";
$stmt=$dbh->query($query2);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    print $row['current_date'];
    print "<br>";
}
?>
