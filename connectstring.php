<?php
$db = parse_url(getenv("postgres://ptplxvkmvcsjez:27151faae2a16ce43680f647bf4387ca2bc91c8c6159944f8b8c9bcc649ce872@ec2-23-21-94-99.compute-1.amazonaws.com:5432/d35djr9rl60o00"));

try{
    
    <?php
$dbh = new PDO('pgsql:dbname=ec2-23-21-94-99.compute-1.amazonaws.com;
                           host=5432;
                           username=ptplxvkmvcsjez;
                           password=27151faae2a16ce43680f647bf4387ca2bc91c8c6159944f8b8c9bcc649ce872');
// $pdo = new PDO("pgsql:" . sprintf(
//     "host=%s;port=%s;user=%s;password=%s;dbname=%s",
//     $db["ec2-23-21-94-99.compute-1.amazonaws.com"],
//     $db["5432"],
//     $db["ptplxvkmvcsjez"],
//     $db["27151faae2a16ce43680f647bf4387ca2bc91c8c6159944f8b8c9bcc649ce872"],
//     ltrim($db["d35djr9rl60o00"], "/")
// ));
}catch(Exception $e){
echo $e->getMessage();
}
