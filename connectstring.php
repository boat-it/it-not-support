<?php
$hostname='ec2-23-21-94-99.compute-1.amazonaws.com';
$username='ptplxvkmvcsjez';
$password='27151faae2a16ce43680f647bf4387ca2bc91c8c6159944f8b8c9bcc649ce872';

try{
    $dbh = new PDO("pgsql:host=$hostname;dbname=d35djr9rl60o00",$username,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo $e->getMessage(),$e->getLine();
}
?>