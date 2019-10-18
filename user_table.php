<?php
require_once 'connectstring.php';
try{
$stmt=$dbh->prepare("SELECT * from user_table")->execute();
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
}catch(Exception $e){
    echo $e->getMessage();
}
print "push OK";
?>
