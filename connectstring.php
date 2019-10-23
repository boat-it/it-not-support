<?php
$db = parse_url(getenv("postgres://ptplxvkmvcsjez:27151faae2a16ce43680f647bf4387ca2bc91c8c6159944f8b8c9bcc649ce872@ec2-23-21-94-99.compute-1.amazonaws.com:5432/d35djr9rl60o00"));
try{
    $dbname="d35djr9rl60o00";
    $host="ec2-23-21-94-99.compute-1.amazonaws.com";
    $username="ptplxvkmvcsjez";
    $passwd="27151faae2a16ce43680f647bf4387ca2bc91c8c6159944f8b8c9bcc649ce872";
    $dbh = new PDO("pgsql:dbname=d35djr9rl60o00;host=ec2-23-21-94-99.compute-1.amazonaws.com","ptplxvkmvcsjez","27151faae2a16ce43680f647bf4387ca2bc91c8c6159944f8b8c9bcc649ce872");
}catch(Exception $e){
    echo $e->getMessage();
}