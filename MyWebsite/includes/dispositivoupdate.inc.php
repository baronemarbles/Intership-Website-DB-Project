<?php

#patrimonio,numero_de_serie,marca,modelo,categoria,localizacao, status_device,observacao

if($_SERVER["REQUEST_METHOD"] == "POST") {
        $campo = $_POST["campo"];
        $val_atual = $_POST["val_atual"];
        $val_novo = $_POST["val_novo"];
        $patrimonio;
        
       
        

        try{
            require "dbh.inc.php";
            $get_patrimonio = "SELECT patrimonio from teste db where :campo = :val_atual;";
            #$check_campo_antigo = "SELECT :campo from testedb where :campo = :val_atual AND patrimonio = $get_patrimonio;";
        
            $stmt= $pdo->prepare($get_patrimonio);
            $stmt->bindParam(":campo",$campo);
            $stmt->bindParam(":val_atual",$val_atual);
            $stmt->execute();
           
            /*
                if($get_patrimonio==$val_atual){
                    $query = "UPDATE testedb SET :valor_atual = :val_novo;";


                    $stmt=$pdo->prepare($query);

                    $stmt->bindParam(":valor_atual", $val_atual);
                    $stmt->bindParam(":val_novo",$val_novo);
        

                    $stmt->execute();

                    $pdo = null;
                    $stmt = null;

                    header("//location:index.php");
                }   else{ die();
                        }
    
        */
        
        
    
    
        
            $pdo = null;
            $stmt = null;

            header("Location: ../index.php");    
            die();
        } catch(PDOException $e) {
            die("Query falhou: " .$e->getMessage());

                }
} else {
    header("Location: ../index.php");
}