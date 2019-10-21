<?php
include 'connectstring.php';
$current_date=date("Y-m-d H:i:s"); //เวลาวันที่ ปัจจุบัน
// นับจำนวน committee ทั้งหมดที่ยังไม่ได้ลงลาน
// ส่วนที่ 1  query user_table มาเช็คว่ามีกี่คนที่ยังไม่ได้ลงลนในรอบปัจจุบัน

$stmt1=$dbh->query("SELECT a.username from user_table a left join department on a.username=b.username where b.sex='1' and a.board='1' and status1='1'")->execute();
$username[]=$stmt1->fetch(PDO::FETCH_ASSOC);
// จำนวนที่ยังไม่ได้ลง จะอยุ่ใน variable countalluser 
$countalluser=count($username);

?>