<?php
session_start();
include "dbh.inc.php";
$id = $_SESSION["idUsers"];

if(isset($_POST["edit-profile-submit"])){
    $uid = $_POST["uid"];
    $bio = $_POST["bio"];
    $file = $_FILES["picture"];

    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileError = $file["error"];
    $fileType = $file["type"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png", "pdf");


    if(empty($_POST["uid"])){

    }
    else{
        $query = $pdo->prepare("UPDATE profiles SET uidUsers=?, bioProfiles=? WHERE idUsers=?;");
        $query->bindValue(1, $uid);
        $query->bindValue(2, $bio);
        $query->bindValue(3, $id);
        $query->execute();
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    $fileNameNew = "profile".$id.".".$fileActualExt;
                    $fileDestination = "../uploads/".$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = $pdo->prepare("UPDATE profiles SET pictureProfiles=? WHERE idUsers=?;");
                    $sql->bindValue(1, $fileNameNew);
                    $sql->bindValue(2, $id);
                    $sql->execute();
                    echo $fileNameNew;
                    echo $id;
                    header("Location: ../my-profile.php");
                    exit();
                }
                else{
                    echo "Your file is too big";
                }
            }
            else{
                echo "There was an error";
            }
        }
        else{
            echo "You cannot upload files of this type!";
        }
    }
}