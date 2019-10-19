
<?php
include('connectstring.php');
if (isset($_GET['id'])){
    
        $stmt=$dbh->query("SELECT a.id,b.status");
        $stmt=execute();
        $row=$stmt->fetchALL(PDO::FETCH_BOTH);
        foreach ($variable as $key) {
            print rand($key[]);
        }

    $stmt=$dbh->query("SELECT * from user_table a left join department b on a.username = b.username where a.id='$_GET[id]'");
    $stmt->execute();
    print "<table border=1 width=50%>";
    print "<th>ID</th>";
    print "<th>USER NAME</th>";
    print "<th>สถานะทำงาน</th>";
    print "<th>กรรมเช้า/บ่าย</th>";
    print "<th>สถานะ(รอบปัจจุบัน)</th>";
    print "<th>แผนก</th>";
    print "<th>เพศ</th>";
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
//         print json_encode($row);
    }
}
?>
