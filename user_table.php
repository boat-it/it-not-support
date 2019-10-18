<?php
require_once 'connectstring.php';
$query="SELECT * form user_table";
$stmt=$dbh->prepare($query)->execute();
print "<table border=1 width=50%>";
print "<tr>";
print "<th>ID</th>";
print "<th>USER NAME</th>";
print "<th>ID@LINE</th>";
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
          print "<tr>";
          print "<td>$row[id]</td>";
         print "<td>$row[username]</td>";
         print "<td>$row[idline]</td>";
          print "</tr>";
}
print "push OK";
?>
