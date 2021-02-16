<?php
class Profile{
    public function fetchAll(){
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM profiles");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetchData($id){
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM profiles WHERE idUsers = ?");
        $query->bindValue(1, $id);
        $query->execute();

        return $query->fetch();
    }
}