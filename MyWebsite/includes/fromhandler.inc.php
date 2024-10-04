<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $pwd = $_POST["password"];
        $email = $_POST["email"];
        

    try{
        require_once "dbh.inc.php";
        
        $query = "INSERT INTO users(username,pw,email) VALUES( :username,:pwd,:email);";
        
        $stmt= $pdo->prepare($query);
        
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd",$pwd);
        $stmt->bindParam(":email",$email);


        $stmt->execute();
        
        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");    

    }   catch(PDOException $e) {
        die("Query falhou: " .$e->getMessage());

    }
} else {
    header("Location: ../index.php");
}