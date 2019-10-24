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
print "<form method=post action=''>
<input name=id_master>
<input name=data_test>
<input name=test_data2>
<input name=test_data3>
<input name=submit value=submit>
</form>";
if (isset($_POST['submit'])){
    $character='hello_world';
    $query="INSERT into testinsert(id_mater,data_test,test_data2,test_data3)values(:id_master,:test_data,:test_data2,:test_data3)";
    $stmt=$dbh->prepare($query);
    $stmt->bindParam(':id_master', $_POST['id_master']);
    $stmt->bindParam(':test_data', $_POST['data_test']);
    $stmt->bindParam(':test_data2', $_POST['test_data2']);
    $stmt->bindParam(':test_data3', $_POST['test_data3']);
    $stmt->execute();
    $querys="SELECT * from testinsert";
    $stmt2=$dbh->prepare($querys);
    $stmt2->execute();
    while ($row=$stmt2->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }
}
// 
// $query=$dbh->prepare("SELECT current_date from check_date_time");
// $stmt->execute();
// while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    // print_r($row);
// }
?>