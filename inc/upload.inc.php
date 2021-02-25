<?php
session_start();
include "dbh.inc.php";
$id = $_SESSION["idUsers"];

if(isset($_POST["edit-profile-submit"])){
    $file= $_FILES["picture"];

    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileError = $file["error"];
    $fileType = $file["type"];

    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpg", "jpeg", "png", "pdf");

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNameNew = "profile".$id.".".$fileActualExt;
                $fileDestination = "uploads/".$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql = $pdo->prepare("UPDATE profiles SET pictureProfile=$fileNameNew WHERE uidUsers=$id;");
                $sql->execute();
                header("Location: index.php?upload=success");
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
else{
    header("Location: index.php");
    exit();
}