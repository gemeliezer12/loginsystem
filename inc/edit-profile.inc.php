<?php
session_start();
include "dbh.inc.php";
$id = $_SESSION["idUsers"];

$folder = "uploads/";
$image = $_FILES["image"]["name"];
$path = $folder . $image;
if(isset($_POST["edit-profile-submit"])){
    $uid = $_POST["uid"];
    $bio = $_POST["bio"];

    if(empty($_POST["uid"])){

    }
    else{
        $query = $pdo->prepare("UPDATE profiles SET uidUsers=?, bioProfiles=? WHERE idUsers=?;");
        $query->bindValue(1, $uid);
        $query->bindValue(2, $bio);
        $query->bindValue(3, $id);
        $query->execute();
        header("Location: ../my-profile.php");
        exit();
    }
}