<?php
include('connectstring.php');
$stmt=$dbh->query("select * from user_table");
$stmt->execute();
print "<table border=1 width=50%>";
print "<th>ID</th>";
print "<th>USER NAME</th>";
print "<th>สถานะทำงาน</th>";
print "<th>กรรมเช้า/บ่าย</th>";
print "<th>สถานะ(รอบปัจจุบัน)</th>";
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    print_r($row);
    print "<tr>";
    print "<td>$row[id]</td>";
    print "<td>$row[username]</td>";
    print "<td>$row[id_line]</td>";
    print "<td>$row[status1]</td>";
    print "<td>$row[status2]</td>";
    print "<td>$row[board]</td>";
    print "</tr>";

}
?>