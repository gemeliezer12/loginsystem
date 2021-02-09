<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=loginsys", "root", "");
}
catch(PDOException $e){
    exit("Database error.");
}