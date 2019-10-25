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
$querys="SELECT * from testinsert";
$stmt2=$dbh->prepare($querys);
$stmt2->execute();
while ($row=$stmt2->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
}

$query="SELECT * from testinsert order by id_master DESC limit 1";
$stmt=$dbh->prepare($query);
$stmt->execute();
$rownum=$stmt->fetch(PDO::FETCH_ASSOC);
print"line1". $count=$rownum['id_master'];
$num=1;
if($num>=$count){
$sumnum=$num+$count;
}else{
    $sumnum=1;
}
try {
        $query="INSERT into testinsert values(:id_master,:test_data2)";
        $stmt=$dbh->prepare($query);
        $stmt->bindParam(':id_master',$sumnum);
        $stmt->bindParam(':test_data2', $currentgmt);
        $stmt->execute();
        // 

    }catch(Exception $e){
        echo $e->getmessage();
    }
?>