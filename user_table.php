<?php
include('connectstring.php');
if (isset($_GET['username'])){
    $stmt=$dbh->query("SELECT * from user_table a left join department on a.username = b.username where username='$_GET[username]");
    $stmt->execute();
    print "<table border=1 width=50%>";
    print "<th>ID</th>";
    print "<th>USER NAME</th>";
    print "<th>สถานะทำงาน</th>";
    print "<th>กรรมเช้า/บ่าย</th>";
    print "<th>สถานะ(รอบปัจจุบัน)</th>";
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
        print "<tr>";
        print "<td>$row[id]</td>";
        print "<td>$row[username]</td>";
        print "<td>$row[id_line]</td>";
        print "<td>".($row['status1']==1?"เช้า":"บ่าย")."</td>";
        print "<td>".($row['status2']==2? "เลื่อน":"ลงเเล้ว")."</td>";
        print "<td>$row[board]</td>";
        print "<td>$row[department]</td>";
        print "<td>$row[sex]</td>";
        print "<td><button valeu='edit' id='btn_edit'>edit</button></td>";
        print "</tr>";
    }
}
?>