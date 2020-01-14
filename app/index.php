<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link src='stylesheet' href='../library/css/bootstrap.min.css'>
    <link src='stylesheet' href='../library/css/jquery.3.4.1.min.css'>
    <script src="../library/js/jquery.3.4.1.min.js"></script>
    <script src="../library/js/bootstrap.min.js"></script>
    <title>management</title>
</head>
<body>
<?php
require '../connectstring.php';
try{
$sql="SELECT * from user_table";
$stmt=$dbh->prepare($sql);
$stmt->execute();
}catch(Exception $e){
     echo $e->getMessage(),$e->getLine();
}
?>
     <table class='table table-sm table-striped table-bordered'>
          <thead>
               <th colspan='5'><h3>รายชื่อกรรมการรับเศษวันนี้</h3></th>
          </thead>
          <tbody>
               <tr>
                    <td>วันที่</td>
                    <td>รายชื่อ</td>
                    <td>แผนก</td>
                    <td>เพศ</td>
                    <td>รอบ</td>
                    <td>ลง</td>
                    <td></td>
               </tr>
               <?php
               while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                         <td><?=$row['id']?></td>
                         <td><?=$row['username']?></td>
                         <td><?=$row['id_line']?></td>
                         <td><?=$row['status1']?></td>
                         <td><?=$row['status2']?></td>
                         <td><?=$row['board']?></td>
                    </tr>
               <?php } ?>

          </tbody>
     </table>
       </body>
</html>
