<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link src='stylesheet' href='../library/css/bootstrap.min.css'>
    <link src='stylesheet' href='../library/css/jquery.3.4.1.min.css'>
    <script src="../library/js/bootstrap.min.js"></script>
    <script src="../library/js/jquery.3.4.1.min.js"></script>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  </body>
</html>
