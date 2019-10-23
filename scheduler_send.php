<?php
include 'connectstring.php';
$current=date("Y-m-d H:i:s");
function convertdatetimezone($date ,$format = 'Y-m-d H:i:s'){
    $tz1= 'UTC';
    $tz2= 'Asia/Bangkok';
    $d= new DateTime($date, new DateTimeZone($tz1));
    $d->setTimezone(new DateTimeZone($tz2));

    return $d->format($format);
}
print "GMT:DATE=".convertdatetimezone($current);
$currentgmt=convertdatetimezone($current);
try{
    $query="INSERT INTO check_date_time (current_dat) values (:current)";
    $stmt=$dbh->prepare($query);
    $stmt->bindParam(':current',$currentgmt);
    $stmt->execute();
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
?>