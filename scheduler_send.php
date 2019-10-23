<?php
include 'connectstring.php';
$current=date("Y-m-d H:i:s");
print "current_date:$current";
print "<hr>";
try{
$query="INSERT INTO check_date_time (current_dat) values (?)";
$stmt=$dbh->prepare($query);
$stmt->execute([$current]);
}catch(Exception $e){
    echo $e->getMessage();
}
// 
$query="SELECT * from check_date_time";
$stmt=$dbh->query($query);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    print_r($row);
    print "<br>";
}