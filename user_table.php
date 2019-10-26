
<?php
include('connectstring.php');
if (isset($_GET['id'])){
    try {
        $stmt=$dbh->query("SELECT * from user_table a left join department b on a.username = b.username where a.id='$_GET[id]' order by a.id ASC limit 1");
        $stmt->execute();
        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
            print $row['username'];
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
?>
