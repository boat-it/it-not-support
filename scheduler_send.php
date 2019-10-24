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
// try{
// $stmt=$dbh->prepare("INSERT into check_date_time(current_date)values(:current_date_time_zone)");
// $stmt->bindParam(':current_date_time_zone',$currentgmt);
// $stmt->execute();
// }catch(Exception $E){
//     echo $E->getMessage();
// }
$num=10000;
$character='hello_world';
$query="INSERT into testinsert(id_mater,test_data,test_data2,test_data3)values(:id_master,:test_data,:test_data2,:test_data3)";
$stmt=$dbh->prepare($query);
$stmt->bindValue(':id_master',01);
$stmt->bindParam(':test_data',$currentgmt);
$stmt->bindParam(':test_data2',$num);
$stmt->bindParam(':test_data3',$character);
$stmt->execute();
$querys="SELECT * from testinsert";
$stmt2=$dbh->prepare($querys);
$stmt2->execute();
while($row=$stmt2->fetch(PDO::FETCH_ASSOC)){
    print_r($row);
}
// 
// $query=$dbh->prepare("SELECT current_date from check_date_time");
// $stmt->execute();
// while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    // print_r($row);
// }
?>