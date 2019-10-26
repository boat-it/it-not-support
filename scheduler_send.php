<?php
include("connectstring.php");
$current=date("Y-m-d H:i:s");
function convertdatetimezone($date ,$format = 'Y-m-d H:i:s'){
    $tz1= 'UTC';
    $tz2= 'Asia/Bangkok';
    $d= new DateTime($date, new DateTimeZone($tz1));
    $d->setTimezone(new DateTimeZone($tz2));

    return $d->format($format);
}
$currentgmt=convertdatetimezone($current);
try {
        $query="INSERT into check_date_time values(:current_date)";
        $stmt=$dbh->prepare($query);
        $stmt->bindParam(':current_date', $currentgmt);
        $stmt->execute();
        // 

}catch(Exception $e){
    echo $e->getmessage();
}
$querys="SELECT * from check_date_time";
$stmt2=$dbh->prepare($querys);
$stmt2->execute();
while ($row=$stmt2->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
    print "<hr>";
}
?>